@extends('frontend.components.layouts')
@section('content')
<div class="container">
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">×</a>
            <strong>{{ $error }}</strong>
        </div>
        @endforeach
    @endif
        <div class="row">
        <style>
                input[type=number]::-webkit-inner-spin-button,
                input[type=number]::-webkit-outer-spin-button {
                    -webkit-appearance: none;
                }
                #stform input[type=email],
                #stform input,
                #stform select,
                #stform textarea {
                    padding: 8px 15px 8px 15px;
                    border: 1px solid #000052;
                    margin-top: 2px;
                    width: 100%;
                    border-radius: 10px;
                    box-sizing: border-box;
                    /* font-family: montserrat; */
                    color: #2C3E50;
                    background-color: #ECEFF1;
                    font-size: 15px !important;
                }
                input,
                select {
                    border: 1px solid #000052 !important;
                    color: #2C3E50;
                    background-color: #ECEFF1;
                }
                .form-control:focus {
                    color: #495057;
                    background-color: #fff;
                    border-color: #000052;
                    outline: 0;
                    box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
                }
                .form-control:focus {
                    border-color: #dc3545;
                    box-shadow: 0 0 0 0.2rem rgb(220 53 69 / 25%);
                }
                .form-group label {
                    font-size: 14px;
                    margin-bottom: 0;
                    position: unset;
                }
                input[type=email] {
                    width: 100%;
                    position: relative;
                    border: 1px solid #000052;
                    padding: 6px;
                    border-radius: 5px;
                }
                label {
                    font-size: 14px;
                }
                .student_info_btn {
                    width: 38%;
                    background: #122f50;
                    font-weight: bold;
                    color: white;
                    border-radius: 10px;
                    border: 0 none;
                    cursor: pointer;
                    padding: 10px 5px;
                    margin: 10px 0px 10px 15px;
                    float: right;
                    font-size: 18px;
                }
                .subscribe-content button{
                    padding: 7px 5px 6px 5px;
                }
                .contact-area input[type=email]{
                    border-radius: 5px;
                }
                .cnt_full {
                    display: block;
                    margin: 20px 10px;
                    width: 100%;
                }

                .cnt_min {
                    display: inline-block;
                    width: 200px;
                    margin: 10px;
                    height: 120px;
                    position: relative;
                    padding: 0 2%;
                }

                .cnt_min input[type="radio"] {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                    opacity: 0;
                }

                .selected_img {
                    pointer-events: none;
                    width: 100%;
                    height: 100%;
                }

                .cnt_min input[type="radio"]:checked~.selected_img {
                    border: 1px solid #000052;
                    box-shadow: 0px 1px 4px 0px #ccc;
                    border-radius: 5px;
                }
            </style>
        <div class="col-12 m-auto m-2">
        <div class="card p-2">
        <form id="stform" action="{{route('enroll_course_rpl')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="text-center">RPL Form</h2>
        <div class="row">
        <div class="col-md-12">
        <label for="course_name">COURSE NAME:*</label>
        <select name="course_id" id="course_id" class="form-control" >
        <option value="{{$course->id}}">{{$course->course_name}}</option>
        </select>
        <span style="color:red;" id="course_name_error"></span>
        </div>
        </div>
        <h4 class="text-center" style="color: #122f50;font-size: 25px;font-weight: bold;margin-top:20px;">Personal Information</h4>
        {{-- <div class="row">
        <div class="col-md-12 mb-3">
        <label for="full_name">FULL NAME:*</label>
        <input type="text" value name="full_name" class="form-control" id="full_name" placeholder="FULL NAME">
        <span style="color:red;" id="full_name_error"></span>
        </div>
        </div> --}}
        <div class="row mb-3">
        <div class="col-md-4">
        <label for="nameE">Name (English): *</label>
        <input class="form-control" name="nameE" id="nameE" placeholder="Enter Your Full Name" type="Text" required>
        <span style="color:red;" id="nameE"></span>
        </div>
        <div class="col-md-4">
        <label for="nameB">Name (Bangla): *</label>
        <input type="text" name="nameB" class="form-control" id="nameB" placeholder="আপনার পুরো নাম লিখুন" required>
        <span style="color:red;" id="nameB"></span>
        </div>
        <div class="col-md-4">
            <label for="phone">MOBILE NUMBER: *</label>
            <input class="form-control" name="phone" required id="phone" placeholder="EX: 01xxxxxxxxx" type="number" minlength="11" maxlength="11" pattern="[0-9]{11}">
            <span style="color:red;" id="phone_error"></span>
        </div>
        <div class="col-md-6">
            <label for="email">Email Address: *</label>
            <input type="email" name="email" required class="form-control" id="email" placeholder="name@example.com">
            <span style="color:red;" id="email_error"></span>
        </div>
        <div class="col-md-4">
            <label for="birthday">Date of Birth: *</label>
            <input name="birthday" required value class="form-control" id="birthday" placeholder="Date of Birth" type="date" />
            <span style="color:red;" id="birthday_error"></span>
        </div>
        <div class="col-md-4">
            <label for="gender">Gender: *</label>
            <select name="gender" required class="form-control" id="gender">
            <option disabled selected value>Select
            Gender
            </option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
            </select>
            <span style="color:red;" id="gender_error"></span>
        </div>
        <div class="col-md-4">
            <label for="disability">Person with Disability ?: *</label>
            <select name="is_disability" required class="form-control" id="disability">
            <option disabled selected value>Select Disability
            </option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
            </select>
            <span style="color:red;" id="disability_error"></span>
        </div>
        <div class="col-md-4">
            <label for="religion">RELIGION:*</label>
            <select name="religion" required id="religion"class="form-control">
            <option disabled selected value>
            ---Select Religion---
            </option>
            <option value="Islam">Islam</option>
            <option value="Hinduism">Hinduism</option>
            <option value="Buddhism">Buddhism</option>
            <option value="Christianity">Christianity
            </option>
            <option value="Others">Other</option>
            </select>
            <span style="color:red;" id="religion_error"></span>
            </div>
            <div class="col-md-4">
                <label for="national_id">National ID / Birth Cirtificate *</label>
                <input value name="national_id" required class="form-control" id="national_id" placeholder="National ID or Birth Cirtificate" type="number" />
                <span style="color:red;" id="national_id_error"></span>
            </div>
        </div>


        <h4 class="text-center" style="color: #122f50;font-size: 25px;font-weight: bold;margin-top:20px;">Perental Information</h4>
        <div class="row mb-3">
        <div class="col-md-4">
        <label for="fatherNameE">Father Name (English): *</label>
        <input class="form-control" name="fatherNameE" id="fatherNameE" placeholder="Enter Your Father Full Name" type="Text" required>
        <span style="color:red;" id="fatherNameE"></span>
        </div>
        <div class="col-md-4">
        <label for="fatherNameB">Father Name (Bangla): *</label>
        <input type="text" name="fatherNameB" class="form-control" id="fatherNameB" placeholder="আপনার বাবার পুরো নাম লিখুন" required>
        <span style="color:red;" id="fatherNameB"></span>
        </div>
        <div class="col-md-4">
        <label for="MotherNameE">Mother Name (English): *</label>
        <input class="form-control" name="motherNameE" id="MotherNameE" placeholder="Enter Your Mother Full Name" type="Text" required>
        <span style="color:red;" id="MotherNameE"></span>
        </div>
        <div class="col-md-4">
        <label for="MotherNameB">Mother Name (Bangla): *</label>
        <input type="text" name="motherNameB" class="form-control" id="MotherNameB" placeholder="আপনার মায়ের পুরো নাম লিখুন" required>
        <span style="color:red;" id="MotherNameB"></span>
        </div>
        <div class="col-md-4">
            <label for="Gname">Gurdian Name (English): *</label>
            <input class="form-control" name="Gname" required id="Gname" placeholder="Enter Your Gurdian Name" type="text">
            <span style="color:red;" id="Gname_error"></span>
        </div>
        <div class="col-md-4">
            <label for="Gphone">Gurdian MOBILE NUMBER: *</label>
            <input class="form-control" name="Gphone" required id="Gphone" placeholder="EX: 01xxxxxxxxx" type="number" minlength="11" maxlength="11" pattern="[0-9]{11}">
            <span style="color:red;" id="phone_error"></span>
        </div>
        </div>

        {{-- <div class="row mb-3" style="margin-top:50px;">
        <div class="col-12">
        <label for="employment_status">Employment Status:*</label>
        <select id="employment_status" required onchange="if (!window.__cfRLUnblockHandlers) return false; employment_status_show()" class="form-control" name="employment_status" id="employment_status" data-cf-modified-109e00ff9346427207673ffd->
        <option disabled selected value>Select Employment Status </option>
        <option value="Student">Student</option>
        <option value="Freelancer">Freelancer</option>
        <option value="Businessman">Businessman
        </option>
        <option value="Entrepreneur">Entrepreneur
        </option>
        <option value="Job_Seeker">Job Seeker</option>
        <option value="Job_Holder">Job Holder</option>
        </select>
        <span style="color:red;" id="employment_status_error"></span>
        </div>
        </div> --}}
        <h4 class="text-center" style="color: #122f50;font-size: 25px;font-weight: bold;margin-top:20px;">Mailing/Present Address</h4>
        <div class="row mb-3">
        <div class="col-md-4">
        <label for="present_address">Village/Town/Road/House/Flat: *</label>
        <input class="form-control"name="present_address" required class="form-control" id="present_address" placeholder="Address" type="text" />
        <span style="color:red;" id="present_address_error"></span>
        </div>
        <div class="col-md-4">
        <label for="present_division">Division: *</label>
        <select class="form-control" required name="present_division" id="present_division">
        <option disabled selected value>Select Division </option>
        <option value="Barisal">Barisal</option>
        <option value="Chittagong">Chittagong</option>
        <option value="Dhaka">Dhaka</option>
        <option value="Khulna">Khulna</option>
        <option value="Rajshahi">Rajshahi</option>
        <option value="Rangpur">Rangpur</option>
        <option value="Sylhet">Sylhet</option>
        <option value="Mymensingh">Mymensingh</option>
        </select>
        <span style="color:red;" id="present_division_error"></span>
        </div>
        <div class="col-md-4">
        <label for="present_per_district">District: *
        *</label>
        <input type="text" id="present_per_district" required class="form-control" name="present_per_district" placeholder="District" />
        <span style="color:red;" id="present_per_district_error"></span>
        </div>
        <div class="col-md-4">
        <label for="present_sub_district">Upazila: *
        </label>
        <input type="text" class="form-control" required name="present_sub_district" id="present_sub_district" placeholder="Upazila" />
        <span style="color:red;" id="present_sub_district_error"></span>
        </div>
        <div class="col-md-4">
            <label for="present_post_office">Post Office: *
            </label>
            <input type="text" class="form-control" required name="present_post_office" id="present_post_office" placeholder="Post-Office" />
            <span style="color:red;" id="present_post_office_error"></span>
        </div>
        <div class="col-md-4">
            <label for="present_postal_code">Postal Code: *</label>
            <input class="form-control" name="present_postal_code" required id="present_postal_code" placeholder="Postal Code" type="number" maxlength="4" minlength="4" />
            <span style="color:red;" id="present_postal_code_error"></span>
        </div>
        </div>

       <div class="row text-center mx-auto ">
          <div class="col-12">
              <h4 class="text-center" style="color: #122f50;font-size: 25px;font-weight: bold;margin-top:20px;">Permanent Address </h4>
          </div>
           <div class="col-12 d-flex  justify-content-center">
               <label style="text-align: center" for="is_present_address_same"> <input type="checkbox" id="is_present_address_same">Same as present?</label>
           </div>
       </div>
            <div class="row mb-3">
        <div class="col-md-4">
        <label for="permanent_address">Village/Town/Road/House/Flat: *</label>
        <input class="form-control" name="permanent_address" required class="form-control" id="permanent_address" placeholder="Address" type="text" />
        <span style="color:red;" id="present_address_error"></span>
        </div>
        <div class="col-md-4">
        <label for="present_division">Division: *</label>
        <select class="form-control" required name="permanent_division" id="permanent_division">
        <option disabled selected value>Select Division </option>
        <option value="Barisal">Barisal</option>
        <option value="Chittagong">Chittagong</option>
        <option value="Dhaka">Dhaka</option>
        <option value="Khulna">Khulna</option>
        <option value="Rajshahi">Rajshahi</option>
        <option value="Rangpur">Rangpur</option>
        <option value="Sylhet">Sylhet</option>
        <option value="Mymensingh">Mymensingh</option>
        </select>
        <span style="color:red;" id="present_division_error"></span>
        </div>
        <div class="col-md-4">
        <label for="permanent_per_district">District: *
        *</label>
        <input type="text" id="permanent_per_district" required class="form-control" name="permanent_per_district" placeholder="District" />
        <span style="color:red;" id="present_per_district_error"></span>
        </div>
        <div class="col-md-4">
        <label for="permanent_sub_district">Upazila: *
        </label>
        <input type="text" class="form-control" required name="permanent_sub_district" id="permanent_sub_district" placeholder="Upazila" />
        <span style="color:red;" id="present_sub_district_error"></span>
        </div>
        <div class="col-md-4">
            <label for="permanent_post_office">Post Office: *
            </label>
            <input type="text" class="form-control" required name="permanent_post_office" id="permanent_post_office" placeholder="Post-Office" />
            <span style="color:red;" id="present_post_office_error"></span>
        </div>
        <div class="col-md-4">
            <label for="permanent_postal_code">Postal Code: *</label>
            <input class="form-control" name="permanent_postal_code" required id="permanent_postal_code" placeholder="Postal Code" type="number" maxlength="4" minlength="4" />
            <span style="color:red;" id="present_postal_code_error"></span>
        </div>
        </div>

        <h4 class="text-center" style="color: #122f50;font-size: 25px;font-weight: bold;margin-top:20px;">Educational Background (Last One)</h4>
        <div class="row mb-3">
        <div class="col-md-4">
        <label for="level_of_education">Level of Education:
        *</label>
        <select id="level_of_education" class="form-control" required name="level_of_education">
        <option disabled selected value>Select
        Level of Education</option>
        <option value="SSC/Dakhil/Equivalent">
        Above PSC</option>
        <option value="SSC/Dakhil/Equivalent">
        SSC/Dakhil/Equivalent</option>
        <option value="HSC/Alim/Equivalent">
        HSC/Alim/Equivalent</option>
        <option value="Diploma">Diploma</option>
        <option value="Bachelor 1st Year">Bachelor's
        1st Year</option>
        <option value="Bachelor 2nd Year">Bachelor's
        2nd Year</option>
        <option value="Bachelor 3rd Year">Bachelor's
        3rd Year</option>
        <option value="Bachelor Final Year">Bachelor's
        Final Year</option>
        <option value="Bachelor/Honours/Equivalent">
        Bachelor's/Honours/Equivalent
        </option>
        <option value="Master Degree">Master's Degree
        </option>
        <option value="PhD">PhD</option>
        </select>
        <span style="color:red;" id="lavel_of_education_error"></span>
        </div>
        <div class="col-md-4">
        <label for="institute_name">Institute/Board: *</label>
        <input name="institute_name" required id="institute_name" placeholder="Write Institute Name" class="form-control" type="text" />
        <span style="color:red;" id="institute_name_error"></span>
        </div>
        <div class="col-md-4">
            <label class="passing_year">Passing Year: *</label>
            <input name="passing_year" required class="form-control" id="passing_year" placeholder="Year" minlength="4" type="number" />
            <span style="color:red;" id="passing_year_error"></span>
        </div>
        <div class="col-md-4">
            <label for="cgpa">CGPA/Division: *</label>
            <input name="cgpa" required id="cgpa" placeholder="Write CGPA/Division" class="form-control" type="text" />
            <span style="color:red;" id="cgpa_error"></span>
        </div>
        </div>

        <h4 class="text-center" style="color: #122f50;font-size: 25px;font-weight: bold;margin-top:20px;">Occupation</h4>
        <div class="row">
        <div class="col-md-4">
        <label for="occupation"> Name of the Occupation and Level: </label>
        <input class="form-control" name="occupation" type="text" id="occupation">
        <span style="color:red;" id="occupation_error"></span>
        </div>
        <div class="col-md-4">
            <label for="experience_year"> Year of Experience: </label>
            <input class="form-control" name="experience_year" type="text" id="experience_year">
            <span style="color:red;" id="occupation_error"></span>
        </div>
        </div>
        <h4 class="text-center" style="color: #122f50;font-size: 25px;font-weight: bold;margin-top:20px;">Upload Documents</h4>
        <div class="row">
        <div class="col-md-4">
        <label for="photo"> Upload Your Photo: </label>
        <input class="form-control" name="image" type="file" id="photo">
        <p><span class="text-danger">**Note:</span> Please upload .png .jpg and File size maximum 1 MB.</p>
        <span style="color:red;" id="photo_error"></span>
        </div>
        <div class="col-md-4">
            <label for="signature"> Upload Your Signature: </label>
            <input class="form-control" name="signature" type="file" id="signature">
            <p><span class="text-danger">**Note:</span> Please upload .png .jpg and File size maximum 1 MB.</p>
            <span style="color:red;" id="signature_error"></span>
        </div>
        <div class="col-md-4">
            <label for="nid_image"> Upload NID/Birth Reg: </label>
            <input class="form-control" name="nid_image" type="file" id="nid_image">
            <p><span class="text-danger">**Note:</span> Please upload .png .jpg .pdf and File size maximum 1 MB.</p>
            <span style="color:red;" id="nid_birth_error"></span>
        </div>
        <div class="col-md-4">
            <label for="work_certificate"> Evidence of work performed/Certificate: </label>
            <input class="form-control" name="work_certificate" type="file" id="work_certificate">
            <p><span class="text-danger">**Note:</span> Please upload only .pdf and File size maximum 5 MB.</p>
            <span style="color:red;" id="evidence_error"></span>
        </div>
        <div class="col-md-4">
            <label for="writen_description"> Details written description of competencies within 50-100 words: </label>
            <input class="form-control" name="writen_description" type="file" id="writen_description">
            <p><span class="text-danger">**Note:</span> Please upload only .pdf and File size maximum 1 MB.</p>
            <span style="color:red;" id="description_error"></span>
        </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="cnt_full">
                    <div class="cnt_min">
                        <input type="radio" name="payment_type" value="offline" required><img
                            src="{{asset('images/offline_payment.jpg')}}"
                            alt="Select payment method" class="selected_img">
                    </div>
                    <div class="cnt_min">
                        <input type="radio" name="payment_type" value="online" required/><img
                            src="{{asset('images/BKash-Logo.wine.png')}}"
                            alt="Select payment method" class="selected_img">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3 justify-content-center">
                <div class="col-md-12 col-xl-12 col-lg-12 col-sm-12 d-flex justify-content-center"><button type="submit" id="seip_student_form_submit" class="student_info_btn text-cencter">Submit</button></div>
        </div>
        </form>
        </div>
        </div>
        </div>
    </div>


<script>
    $(document).ready(function (){
       // is_present_address_same checkbox
         $('#is_present_address_same').click(function(){

            const present_address = $("#present_address").val();
            const present_division = $("#present_division").val();
            const present_per_district = $("#present_per_district").val();
            const present_sub_district = $("#present_sub_district").val();
            const present_post_office = $("#present_post_office").val();
            const present_postal_code = $("#present_postal_code").val();


              if($(this).is(':checked')){
                $('#permanent_address').val(present_address);
                $('#permanent_per_district').val(present_per_district);
                $('#permanent_sub_district').val(present_sub_district);
                $('#permanent_sub_district').val(present_sub_district);
                $('#permanent_post_office').val(present_post_office);
                $('#permanent_postal_code').val(present_postal_code);
        //      selected option
                $("#permanent_division option").filter(function() {
                    return this.text == present_division;
                }).attr('selected', true);

              }else{
                  $('#permanent_address').val('');
                  $('#permanent_per_district').val('');
                  $('#permanent_sub_district').val('');
                  $('#permanent_sub_district').val('');
                  $('#permanent_post_office').val('');
                  $('#permanent_postal_code').val('');
              }
         });
    });
</script>

@endsection

