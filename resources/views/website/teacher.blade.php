<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head> 
<body>
<div class="bg-white rounded-15 shadow-md width-540 px-5 px-sm-7 py-10 mx-auto " style="display: block;" id="faculty_reg">
    <h4 class="text-center text-success">{{session('message')}}</h4>
    <h1 class="text-center mb-7"> Teacher Patient  Registration </h1>
    <form action="{{route('new.user')}}" method="POST" enctype="multipart/form-data">
        @csrf
{{--        <input type="hidden" name="_token" value="f8gwgPE3O5KfMP1NT30pougnHSAs6i98WUzUzjtc"><input type="hidden" name="pataient_category" value="faculty">--}}
        <input type="hidden" value="teacher" name="user_type">
        <div class="row">
            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="formInputFirstName" class="form-label">
                    First Name:<span class="required"></span>
                </label>
                <input name="first_name" type="text" class="form-control" id="first_name" placeholder=" First Name" aria-describedby="firstName" value="" onkeypress="if (/\s/g.test(this.value)) this.value = this.value.replace(/\s/g,&quot;&quot;)" required="">
            </div>
            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="last_name" class="form-label">
                    Last Name:<span class="required"></span>
                </label>
                <input name="last_name" type="text" class="form-control" id="last_name" placeholder=" Last Name" aria-describedby="lastName" onkeypress="if (/\s/g.test(this.value)) this.value = this.value.replace(/\s/g,&quot;&quot;)" required="" value="">
            </div>

            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="last_name" class="form-label">
                    Date Of Birth<span class="required"></span>
                </label>
                <input type="date" name="date_of_birth" class="form-control">

            </div>

            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="last_name staff_office" style="display:none;" id="tstaff_office" class="form-label">
                    Office<span class="required" style="display:none;"></span>
                </label>
                <label for="last_name staff_center" style="display:none;" id="tstaff_center" class="form-label">
                    Center<span class="required"></span>
                </label>
                <label for="last_name staff_dep" style="display:none;" id="tstaff_dep" class="form-label">
                    Department<span class="required"></span>
                </label>
                <select class="form-control show_off" id="tstaffdept" name="staff_dept">
                    <option>Please Choose One</option>
                    <option>Department</option>
                    <option>Office</option>
                    <option>Center</option>

                </select>
                <input type="text" id="tstaff_dept" class="form-control staff_dept" name="deparment" style="display:none;" value="">

                <select class="form-control depshow" id="tdepshow" style="display:none;" name="dept">
                    <option>Faculty of Engineering and Technology</option>
                    <option>Department of Mechanical and Production Engineering (​MPE​)</option>
                    <option>Department of Electrical and Electronic Engineering (​EEE​)</option>
                    <option>Department of Computer Science and Engineering (​CSE​)</option>
                    <option>Department of Civil and Environmental Engineering (​CEE​)</option>
                    <option>Faculty of Science and Technical Education</option>
                    <option>Department of Technical and Vocational Education (​TVE​) </option>
                    <option>Department of Business and Technology Management (​BTM​)</option>
                    <option>Department of Natural Sciences (NSc)</option>



                </select>
            </div>



            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="bank_account" class="form-label">
                    Bank Account<span class="required"></span>
                </label>
                <input type="text" name="banka_ccount" class="form-control">

            </div>
            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="last_name" class="form-label">
                    Designation<span class="required"></span>
                </label>
                <input type="text" name="designation" class="form-control">

            </div>
            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="last_name" class="form-label">
                    Nationality<span class="required"></span>
                </label>
                <select class="form-control" id="nationalityy" name="nationality">
                    <option>Bangladesh</option>
                    <option>Turky</option>
                    <option>Indea</option>
                    <option id="others">other</option>
                </select>
                <input type="text" id="nationality" class="form-control" name="nationality" style="display:none;" value="">

            </div>
            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="last_name" class="form-label">
                    Image<span class="required"></span>
                </label>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="email" class="form-label"> Email:<span class="required"></span> </label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder=" Email" value="" required="">
            </div>
            <div class="col-md-6 mb-sm-7 mb-4">
                <label class="form-label">Phone Number
                    <span class="required"></span>
                </label>
                <input type="number" class="form-control" name="phone" value="" placeholder="Phone Number" minlength="10" maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,&quot;&quot;)" onkeypress="if (/\s/g.test(this.value)) this.value = this.value.replace(/\s/g,&quot;&quot;)" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="password" class="form-label">
                    Password:<span class="required"></span>
                </label>
                <div class="mb-3 position-relative">
                    <input type="password" name="password" class="form-control" id="password" onkeypress="if (/\s/g.test(this.value)) this.value = this.value.replace(/\s/g,&quot;&quot;)" placeholder=" Password" aria-describedby="password" required="" aria-label="Password" data-toggle="password">
                </div>
            </div>
            <div class="col-md-6 mb-sm-7 mb-4">
                <label for="password_confirmation" class="form-label">
                    Confirm Password:<span class="required"></span>
                </label>
                <div class="mb-3 position-relative">
                    <input name="confirm_password" type="password" class="form-control" placeholder=" Confirm Password" id="password_confirmation" aria-describedby="confirmPassword" required="" aria-label="Password" onkeypress="if (/\s/g.test(this.value)) this.value = this.value.replace(/\s/g,&quot;&quot;)" data-toggle="password">
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-sm-7 mb-4">
            <div class="form-group mb-5">
                <label class="form-label">Gender
                    <span class="required"></span> &nbsp;<br>
                </label>
                <br>
                <div class="d-flex align-items-center">

                    <div class="form-check me-5">
                        <input class="form-check-input" type="radio" name="gender" value="0" checked="" id="male">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>

                    <div class="form-check me-10">
                        <input class="form-check-input" type="radio" name="gender" value="1" id="female">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12" style="display:flex">


{{--                <div class="col-md-6 mb-4" style="display:flex">--}}
{{--                        <div><input type="file" name="image" class="form-control"></div>--}}

{{--                    </div>--}}



{{--                    <div class="col-md-6">--}}

{{--                        <div class="soutput">--}}
{{--                            <img id="sphoto" alt="The screen capture will appear in this box." src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGlJREFUeF7t1AEJADAMA8HVv5Oa3GAuHq4KwqVkdvceR4AAgYDAGKxASyISIPAFDJZHIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRB46/vA5AUJNVYAAAAASUVORK5CYII=">--}}
{{--                        </div>--}}
{{--                    </div>--}}



                </div>
            </div>






        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

        <div class="d-flex align-items-center mt-4">
            <span class="text-gray-700 me-2">Already User ?</span>
            <a href="https://iutmc.iutoic-dhaka.edu/login" class="link-info fs-6 text-decoration-none">
                Sign In
            </a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
