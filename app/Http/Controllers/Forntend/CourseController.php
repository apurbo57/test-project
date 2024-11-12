<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\RegularStudent;
use App\Models\RplStudent;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CourseController extends Controller
{
    private $app_key = "Lm5F4PZITOqT4SLifM8DJmYttc";
    private $app_secret = "oynOHPAH0KHj4OPXvvCgdFrdivWDTrSjq2OsgH3VlJOzR01tn17U";
    private $username = "01982627790";
    private $password = "No:[45E*oGq";
    private $base_url = "https://tokenized.pay.bka.sh/v1.2.0-beta";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = course::latest()->get();
        return view('frontend.courses', compact('courses'));
    }
    /**
     * Display a listing of the RPL resource.
     */
    public function rpl()
    {
        $courses = course::where('course_type', 2)->latest()->get();
        return view('frontend.rpl', compact('courses'));
    }
    /**
     * Display Single course Details.
     */
    public function show(string $id)
    {
        $course = course::with('teacher')->find($id);
        if ($course) {
            return view('frontend.single-course', compact('course'));
        }
        return redirect()->back();
    }
    /**
     * course Apply Form.
     */
    public function apply_course(string $id)
    {
        $course = course::find($id);
        if ($course) {
            if ($course->course_type == 1) {
                return view('frontend.regular_apply_form', compact('course'));
            } else {
                return view('frontend.rpl_apply_form', compact('course'));
            }
        }
        return redirect()->back();
    }
    /**
     * Store Enroll course Details.
     */
    public function enroll_course(Request $request)
    {

        $request->validate([
            'course_id' => 'required',
            'nameE' => 'required',
            'nameB' => 'required',
            'fatherNameE' => 'required',
            'fatherNameB' => 'required',
            'motherNameE' => 'required',
            'motherNameB' => 'required',
            'phone' => 'required',
            'Gphone' => 'required',
            'email' => 'required',
            'shift' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'national_id' => 'required',
            'employment_status' => 'required',
            'present_address' => 'required',
            //            'present_city' => 'required',
            'present_postal_code' => 'required',
            'present_division' => 'required',
            'present_per_district' => 'required',
            'present_sub_district' => 'required',
            'level_of_education' => 'required',
            'institute_name' => 'required',
            'subject' => 'required',
            'passing_year' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'payment_type' => 'required'
        ]);

        $input = $request->except('_token');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileEx = $image->getClientOriginalExtension();
            $fileName = date('Ydmhis.') . $fileEx;
            $request->image->move(public_path('uploads/regular'), $fileName);
            $input['image'] = $fileName;
        }

        $regularStudent = RegularStudent::create($input);
        if ($request->payment_type == 'offline') {
            return redirect()->route('enroll.success', $regularStudent->id);
        } else {
            $course = course::select('id', 'course_price')->findorfail($request->course_id);

            $response = self::getToken();
            $auth = $response['id_token'];
            session()->put('token', $auth);
            $callbackURL = route('bkash.callback', ['payment_id' => $regularStudent->id, 'token' => $auth, 'type' => 'regular']);

            $requestbody = array(
                'mode' => '0011',
                'amount' => $course->course_price,
                'currency' => 'BDT',
                'intent' => 'sale',
                'payerReference' => $regularStudent->id,
                'merchantInvoiceNumber' => 'invoice_' . $regularStudent->id,
                'callbackURL' => $callbackURL
            );

            $url = curl_init($this->base_url . '/tokenized/checkout/create');
            $requestbodyJson = json_encode($requestbody);

            $header = array(
                'Content-Type:application/json',
                'Authorization:' . $auth,
                'X-APP-Key:' . $this->app_key
            );

            curl_setopt($url, CURLOPT_HTTPHEADER, $header);
            curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
            curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            $resultdata = curl_exec($url);
            curl_close($url);

            $obj = json_decode($resultdata);
            return redirect()->away($obj->{'bkashURL'});
        }
    }
    public  function  success($applicantId)
    {
        $regularStudent =  RegularStudent::find($applicantId);
        return view('frontend.thank-you', compact('regularStudent'));
    }

    public function enroll_course_rpl(Request $request)
    {

        $request->validate([
            'nameE' => 'required',
            'nameB' => 'required',
            'fatherNameE' => 'required',
            'fatherNameB' => 'required',
            'motherNameE' => 'required',
            'motherNameB' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'Gphone' => 'required',
            'Gname' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'national_id' => 'required',
            'present_address' => 'required',
            'present_postal_code' => 'required',
            'present_post_office' => 'required',
            'present_division' => 'required',
            'present_per_district' => 'required',
            'present_sub_district' => 'required',
            'permanent_address' => 'required',
            'permanent_postal_code' => 'required',
            'permanent_post_office' => 'required',
            'permanent_division' => 'required',
            'permanent_per_district' => 'required',
            'permanent_sub_district' => 'required',
            'level_of_education' => 'required',
            'institute_name' => 'required',
            'passing_year' => 'required',
            'cgpa' => 'required',
            'occupation' => 'required',
            'experience_year' => 'required',
            'image' => 'required|image',
            'signature' => 'required',
            'nid_image' => 'required',
            'work_certificate' => 'required',
            'writen_description' => 'required',
            'is_disability' => 'required',
            'payment_type' => 'required'
        ]);

        $input = $request->except('_token');
        $input['is_disability'] = $request->is_disability == 'yes' ? true : false;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileEx = $image->getClientOriginalExtension();
            $fileName = 'image-' . date('Ydmhis.') . $fileEx;
            $request->image->move(public_path('uploads/rpl'), $fileName);
            $input['image'] = $fileName;
        }

        if ($request->hasFile('signature')) {
            $image = $request->file('signature');
            $fileEx = $image->getClientOriginalExtension();
            $fileName = 'signature-' . date('Ydmhis.') . $fileEx;
            $request->signature->move(public_path('uploads/rpl'), $fileName);
            $input['signature'] = $fileName;
        }

        if ($request->hasFile('nid_image')) {
            $image = $request->file('nid_image');
            $fileEx = $image->getClientOriginalExtension();
            $fileName = 'nid_image-' . date('Ydmhis.') . $fileEx;
            $request->nid_image->move(public_path('uploads/rpl'), $fileName);
            $input['nid_image'] = $fileName;
        }
        if ($request->hasFile('work_certificate')) {
            $image = $request->file('work_certificate');
            $fileEx = $image->getClientOriginalExtension();
            $fileName = 'work_certificate-' . date('Ydmhis.') . $fileEx;
            $request->work_certificate->move(public_path('uploads/rpl'), $fileName);
            $input['work_certificate'] = $fileName;
        }
        if ($request->hasFile('writen_description')) {
            $image = $request->file('writen_description');
            $fileEx = $image->getClientOriginalExtension();
            $fileName = 'writen_description-' . date('Ydmhis.') . $fileEx;
            $request->writen_description->move(public_path('uploads/rpl'), $fileName);
            $input['writen_description'] = $fileName;
        }

        $RplStudent = RplStudent::create($input);
        if ($request->payment_type == 'offline') {
            return redirect()->route('enroll.success.rpl', $RplStudent->id);
        }
        $course = course::select('id', 'course_price')->findorfail($request->course_id);

        $response = self::getToken();
        $auth = $response['id_token'];
        session()->put('token', $auth);
        $callbackURL = route('bkash.callback', ['payment_id' => $RplStudent->id, 'token' => $auth, 'type' => 'rpl']);

        $requestbody = array(
            'mode' => '0011',
            'amount' => $course->course_price,
            'currency' => 'BDT',
            'intent' => 'sale',
            'payerReference' => $RplStudent->id,
            'merchantInvoiceNumber' => 'invoice_' . $RplStudent->id,
            'callbackURL' => $callbackURL
        );

        $url = curl_init($this->base_url . '/tokenized/checkout/create');
        $requestbodyJson = json_encode($requestbody);

        $header = array(
            'Content-Type:application/json',
            'Authorization:' . $auth,
            'X-APP-Key:' . $this->app_key
        );

        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $resultdata = curl_exec($url);
        curl_close($url);

        $obj = json_decode($resultdata);
        return redirect()->away($obj->{'bkashURL'});
    }


    public  function  rplSuccess($applicantId)
    {
        $rplStudent =  RplStudent::find($applicantId);
        return view('frontend.rpl_thank-you', compact('rplStudent'));
    }

    /**
     * Apply Form Download.
     */
    public function regularFormDownload($id)
    {
        $regularStudent = RegularStudent::find($id);
        $pdf = PDF::loadView('frontend.components.apply-form', compact('regularStudent'))
            ->setPaper('a4', 'portrait')
            ->setOption(['dpi' => 350, 'defaultFont' => 'sans-serif']);

        return $pdf->download('Shilmandi_Training_institiute_center_apply_form.pdf');
    }
    public function rplFormDownload($id)
    {
        $regularStudent = RplStudent::find($id);
        $pdf = PDF::loadView('frontend.components.rpl_apply-form', compact('regularStudent'))
            ->setPaper('a4', 'portrait')
            ->setOption(['dpi' => 350, 'defaultFont' => 'sans-serif']);

        return $pdf->download('Shilmandi_Training_institiute_center_apply_form.pdf');
    }


    /**
     * PDF Generate.
     */
    public function generate_pdf()
    {
        $data = 'Anowar Hossain Apurbo';
        $pdf  = Pdf::loadView('frontend.components.certificate')
            ->setPaper('a4', 'landscape')
            ->setOption(['dpi' => 350, 'defaultFont' => 'sans-serif']);

        return $pdf->download('certificate.pdf');
    }
    /**
     * PDF Download.
     */
    public function download_pdf()
    {
        // $pdf = app('dompdf.wrapper');
        // $contxt = stream_context_create([
        //     'ssl' => [
        //         'verify_peer' => FALSE,
        //         'verify_peer_name' => FALSE,
        //         'allow_self_signed' => TRUE,
        //     ]
        // ]);
        // $pdf = PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        // $pdf->getDomPDF()->setHttpContext($contxt);
        // $pdf->loadView('frontend.components.certificate');
        // return $pdf->download('certificate_download ');
        return view('frontend.components.certificate');
    }

    // bkash payment

    public function getToken()
    {
        $post_token = array(
            'app_key' => $this->app_key,
            'app_secret' => $this->app_secret
        );

        $url = curl_init($this->base_url . '/tokenized/checkout/token/grant');
        $post_token_json = json_encode($post_token);
        $header = array(
            'Content-Type:application/json',
            'username:' . $this->username,
            'password:' . $this->password
        );

        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $post_token_json);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

        $resultdata = curl_exec($url);
        curl_close($url);

        $response = json_decode($resultdata, true);

        if (array_key_exists('msg', $response)) {
            return $response;
        }

        return $response;
    }
    public function callback(Request $request)
    {
        $paymentID = $_GET['paymentID'];
        $type = $_GET['type'];
        $auth = $_GET['token'];
        $request_body = array(
            'paymentID' => $paymentID
        );
        $url = curl_init($this->base_url . '/tokenized/checkout/execute');

        $request_body_json = json_encode($request_body);

        $header = array(
            'Content-Type:application/json',
            'Authorization:' . $auth,
            'X-APP-Key:' . $this->app_key
        );

        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $request_body_json);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $resultdata = curl_exec($url);
        curl_close($url);
        $obj = json_decode($resultdata);

        if ($obj->statusCode == '0000') {
            if ($type == 'regular') {
                RegularStudent::findorfail($request['payment_id'])->update([
                    'status' => 'approved',
                    'transaction_id' => $obj->trxID
                ]);
                return redirect()->route('enroll.success', ['id' => $request['payment_id']]);
            }
            if ($type == 'rpl') {
                RplStudent::findorfail($request['payment_id'])->update([
                    'status' => 'approved',
                    'transaction_id' => $obj->trxID
                ]);
                return redirect()->route('enroll.success.rpl', ['id' => $request['payment_id']]);
            }
        } else {
            return "Payment Failed, Something Wen't wrong!";
        }
    }
}
