@extends('layouts.frontend')
@section('title')
    <title>Listing | GSP - The best place to explore your favourite business.</title>
@endsection
@section('custom_head')
    <!-- Custom styles for this template -->
@endsection
@section('content')
    <main>
        <div class="container my-4 form-container pt-3 rounded-3">
            <ul class="nav nav-underline justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-business-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-business" type="button" role="tab" aria-controls="pills-business"
                        aria-selected="true">
                        <small class="fw-semibold">Business Listing</small>
                    </button>
                </li>
                <!--<li class="nav-item" role="presentation">-->
                <!--    <button class="nav-link" id="pills-product-tab" data-bs-toggle="pill" data-bs-target="#pills-product" type="button" role="tab" aria-controls="pills-product" aria-selected="false">-->
                <!--        <small class="fw-semibold">Product Listing</small>-->
                <!--    </button>-->
                <!--</li>-->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-expert-tab" data-bs-toggle="pill" data-bs-target="#pills-expert"
                        type="button" role="tab" aria-controls="pills-expert" aria-selected="false">
                        <small class="fw-semibold">Expert Listing</small>
                    </button>
                </li>
                <!--<li class="nav-item" role="presentation">-->
                <!--    <button class="nav-link" id="pills-brand-tab" data-bs-toggle="pill" data-bs-target="#pills-brand" type="button" role="tab" aria-controls="pills-brand" aria-selected="false">-->
                <!--        <small class="fw-semibold">Brand Listing</small>-->
                <!--    </button>-->
                <!--</li>-->
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-business" role="tabpanel"
                    aria-labelledby="pills-business-tab" tabindex="0">
                    <h4 class="text-center my-3" style="color: var(--sky-blue);">Add Your Business With XXXXX</h4>
                    <div id="app" class="container">
                        <form-wizard @on-complete="onComplete" :title="formTitle" :subtitle="formSubtitle"
                            :next-button-text="nextButtonText" :back-button-text="backButtonText"
                            :finish-button-text="finishButtonText" :step-size="stepSize" :validate-on-back="validateOnBack"
                            :color="color" :error-color="errorColor" :shape="shape"
                            :transition="transition" :start-index="startIndex">

                            <tab-content title="Contact Information" icon="fa fa-user">
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col">
                                        <div class="mb-2">
                                            <label for="contactPersonName" class="form-label">
                                                <small class="fw-semibold asterisk">Contact Person Name</small>
                                            </label>
                                            <input type="text" class="form-control" id="contactPersonName"
                                                aria-describedby="contactPersonNameHelp"
                                                placeholder="Enter Contact person name"
                                                v-model="formData.contact_person_name" required>
                                            <div id="contactPersonNameHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="email" class="form-label">
                                                <small class="fw-semibold asterisk">Email address</small>
                                            </label>
                                            <input type="email" class="form-control" id="email"
                                                aria-describedby="emailHelp" placeholder="example@gmail.com"
                                                v-model="formData.email" required>
                                            <div id="emailHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="mobile" class="form-label">
                                                <small class="fw-semibold asterisk">Mobile</small>
                                            </label>
                                            <input type="number" class="form-control" id="mobile"
                                                aria-describedby="mobileHelp" placeholder="+880 17899 888888"
                                                v-model="formData.mobile" required>
                                            <div id="mobileHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="whatsappNumber" class="form-label">
                                                <small class="fw-semibold asterisk">Whatsapp Number</small>
                                            </label>
                                            <input type="number" class="form-control" id="whatsappNumber"
                                                aria-describedby="whatsappNumberHelp" placeholder="+880 17899 888888"
                                                v-model="formData.whatsapp_number" required>
                                            <div id="whatsappNumberHelp" class="form-text"></div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-2">
                                            <label for="googleMapDirection" class="form-label">
                                                <small class="fw-semibold">Google Map Direction</small>
                                            </label>
                                            <input type="url" class="form-control" id="googleMapDirection"
                                                aria-describedby="googleMapDirectionHelp"
                                                placeholder=" https://goo.gl/maps/WrgcUKFweVWuUpHHA"
                                                v-model="formData.google_map_direction">
                                            <div id="googleMapDirectionHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="address" class="form-label">
                                                <small class="fw-semibold asterisk">Address</small>
                                            </label>
                                            <input type="text" class="form-control" id="address"
                                                aria-describedby="addressHelp" placeholder="Enter Your Address"
                                                v-model="formData.address" required>
                                            <div id="addressHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="websiteLink" class="form-label">
                                                <small class="fw-semibold">Website Link</small>
                                            </label>
                                            <input type="url" class="form-control" id="websiteLink"
                                                aria-describedby="websiteLinkHelp" placeholder="https://www.example.com"
                                                v-model="formData.website_link">
                                            <div id="websiteLinkHelp" class="form-text"></div>
                                        </div>
                                    </div>
                                </div>
                            </tab-content>

                            <tab-content title="Company Information" icon="fa fa-city">
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col">
                                        <div class="mb-2">
                                            <label for="companyName" class="form-label">
                                                <small class="fw-semibold asterisk">Company Name</small>
                                            </label>
                                            <input type="text" class="form-control" id="companyName"
                                                aria-describedby="companyNameHelp" placeholder="Enter Company Name"
                                                v-model="formData.company_name" required>
                                            <div id="companyNameHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="companyEmail" class="form-label">
                                                <small class="fw-semibold asterisk">Email address</small>
                                            </label>
                                            <input type="email" class="form-control" id="companyEmail"
                                                aria-describedby="companyEmailHelp" placeholder="example@gmail.com"
                                                v-model="formData.company_email" required>
                                            <div id="companyEmailHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="companyMobile" class="form-label">
                                                <small class="fw-semibold asterisk">Company Mobile</small>
                                            </label>
                                            <input type="number" class="form-control" id="companyMobile"
                                                aria-describedby="companyMobileHelp" placeholder="+880 17899 888888"
                                                v-model="formData.company_mobile" required>
                                            <div id="companyMobileHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="businessType" class="form-label">
                                                <small class="fw-semibold asterisk">Business Type</small>
                                            </label>
                                            <input type="text" class="form-control" id="businessType"
                                                aria-describedby="businessTypeHelp" placeholder="Enter Business Type"
                                                v-model="formData.business_type" required>
                                            <div id="businessTypeHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="businessCategory" class="form-label">
                                                <small class="fw-semibold asterisk">Business Category</small>
                                            </label>
                                            <select class="form-select select2" aria-label="Select Business Category"
                                                aria-describedby="businessCategoryHelp"
                                                v-model="formData.business_category_id"
                                                data-placeholder="Select Business Category" required>
                                                <option selected>Select Business Category</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <div id="businessCategoryHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="businessType" class="form-label">
                                                <small class="fw-semibold">WhatsApp Number (Optional)</small>
                                            </label>
                                            <input type="text" class="form-control" id="businessType"
                                                aria-describedby="businessTypeHelp" placeholder="Enter WhatsApp Number"
                                                v-model="formData.business_type" required>
                                            <div id="businessTypeHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="businessType" class="form-label">
                                                <small class="fw-semibold">Social Media Links (Optional)</small>
                                            </label>
                                            <input type="text" class="form-control" id="businessType"
                                                aria-describedby="businessTypeHelp" placeholder="Enter Social Media Links"
                                                v-model="formData.business_type" required>
                                            <div id="businessTypeHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="businessType" class="form-label">
                                                <small class="fw-semibold ">Website</small>
                                            </label>
                                            <input type="text" class="form-control" id="businessType"
                                                aria-describedby="businessTypeHelp" placeholder="Enter Website"
                                                v-model="formData.business_type" required>
                                            <div id="businessTypeHelp" class="form-text"></div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="businessType" class="form-label">
                                                <small class="fw-semibold asterisk">Business Hours</small>
                                            </label>
                                            <input type="text" class="form-control" id="businessType"
                                                aria-describedby="businessTypeHelp" placeholder="Enter Business Hours"
                                                v-model="formData.business_type" required>
                                            <div id="businessTypeHelp" class="form-text"></div>
                                        </div>


                                    </div>
                                    <div class="col">
                                        <div class="mb-2">
                                            <label for="companyDescription asterisk" class="form-label">
                                                <small class="fw-semibold">Company Description</small>
                                            </label>
                                            <textarea class="form-control" id="companyDescription" rows="10" aria-describedby="companyDescriptionHelp"
                                                placeholder="Write Company Description Here..." v-model="formData.company_description" required></textarea>
                                            <div id="companyDescriptionHelp" class="form-text"></div>
                                        </div>
                                    </div>
                                </div>
                            </tab-content>

                            <tab-content title="Team Members" icon="fa fa-users">

                                <div class="mb-3">
                                    <div class="text-center">
                                        <label for="avatar">
                                            <div class="text-center">
                                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png') }}"""""""
                                                    class="rounded-circle avatar img-circle img-thumbnail" alt="avatar"
                                                    style="width: 150px; height: 150px;">
                                            </div>
                                            <div class="text-center mt-2">
                                                <h6>Upload a 150*150 Photo</h6>
                                            </div>
                                            <input type="file" class="text-center center-block file-upload"
                                                id="avatar" style="visibility: hidden;">
                                        </label>

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="teamMembers" class="form-label">
                                        <small class="fw-semibold asterisk">Name</small>
                                    </label>
                                    <input type="text" class="form-control" id="teamMembers"
                                        aria-describedby="teamMembersHelp" placeholder="Enter Name"
                                        v-model="formData.team_members" required>
                                    <div id="teamMembersHelp" class="form-text"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="teamMembers" class="form-label">
                                        <small class="fw-semibold asterisk">Designation </small>
                                    </label>
                                    <input type="text" class="form-control" id="teamMembers"
                                        aria-describedby="teamMembersHelp" placeholder="Enter Designation "
                                        v-model="formData.team_members" required>
                                    <div id="teamMembersHelp" class="form-text"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="teamMembers" class="form-label">
                                        <small class="fw-semibold asterisk">Years of Experience </small>
                                    </label>
                                    <input type="text" class="form-control" id="teamMembers"
                                        aria-describedby="teamMembersHelp" placeholder="Enter Years of Experience "
                                        v-model="formData.team_members" required>
                                    <div id="teamMembersHelp" class="form-text"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="teamMembers" class="form-label">
                                        <small class="fw-semibold asterisk">Language</small>
                                    </label>
                                    <input type="text" class="form-control" id="teamMembers"
                                        aria-describedby="teamMembersHelp" placeholder="Enter Language"
                                        v-model="formData.team_members" required>
                                    <div id="teamMembersHelp" class="form-text"></div>
                                </div>

                            </tab-content>

                            <tab-content title="Additional Information" icon="fa fa-info">
                                <div class="mb-2">
                                    <label for="country" class="form-label">
                                        <small class="fw-semibold asterisk">Country</small>
                                    </label>
                                    <select class="form-select select2" aria-label="Select Country"
                                        aria-describedby="countryHelp" data-placeholder="Select Country"
                                        v-model="formData.country" required>
                                        <option>Select country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh" selected>Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cabo Verde">Cabo Verde</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic (Czechia)">Czech Republic (Czechia)</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="DR Congo">DR Congo</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Eswatini">Eswatini</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Holy See">Holy See</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="North Korea">North Korea</option>
                                        <option value="North Macedonia">North Macedonia</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts & Nevis">Saint Kitts & Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="South Sudan">South Sudan</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="St. Vincent & Grenadines">St. Vincent & Grenadines</option>
                                        <option value="State of Palestine">State of Palestine</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    <div id="countryHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="city" class="form-label">
                                        <small class="fw-semibold asterisk">City</small>
                                    </label>
                                    <input type="text" class="form-control" id="city"
                                        aria-describedby="cityHelp" placeholder="Enter Your City" v-model="formData.city"
                                        required>
                                    <div id="cityHelp" class="form-text"></div>
                                </div>
                            </tab-content>

                        </form-wizard>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab"
                    tabindex="0">
                    <h4 class="text-center my-3" style="color: var(--sky-blue);">Add Your Product With XXXXX</h4>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row row-cols-1 row-cols-md-3">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="productName" class="form-label">
                                        <small class="fw-semibold asterisk">Product Name</small>
                                    </label>
                                    <input type="text" class="form-control" id="productName"
                                        aria-describedby="productNameHelp" placeholder="Enter Product name"
                                        name="name" required>
                                    <div id="productNameHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="productCategory" class="form-label">
                                        <small class="fw-semibold asterisk">Product Category</small>
                                    </label>
                                    <select class="form-select select2" aria-label="Select Product Category"
                                        aria-describedby="productCategoryHelp" data-placeholder="Select Produvt Category"
                                        name="category_id" required>
                                        <option selected>Select Expert Category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <div id="productCategoryHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="productSubCategory" class="form-label">
                                        <small class="fw-semibold asterisk">Product Sub Category</small>
                                    </label>
                                    <select class="form-select select2" aria-label="Select Product Sub Category"
                                        aria-describedby="productSubCategoryHelp" name="sub_category_id" required>
                                        <option selected>Select Expert Category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <div id="productSubCategoryHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="productType" class="form-label">
                                        <small class="fw-semibold asterisk">Product Type</small>
                                    </label>
                                    <input type="text" class="form-control" id="productType"
                                        aria-describedby="productTypeHelp" placeholder="Enter Product Type"
                                        name="type" required>
                                    <div id="productTypeHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="mobile" class="form-label">
                                        <small class="fw-semibold asterisk">Mobile</small>
                                    </label>
                                    <input type="number" class="form-control" id="mobile"
                                        aria-describedby="mobileHelp" placeholder="+880 17899 888888" name="mobile"
                                        required>
                                    <div id="mobileHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="brand" class="form-label">
                                        <small class="fw-semibold asterisk">Product Brand</small>
                                    </label>
                                    <input type="text" class="form-control" id="brand"
                                        aria-describedby="brandHelp" placeholder="Enter Product Brand" name="brand"
                                        required>
                                    <div id="brandHelp" class="form-text"></div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-2">
                                    <label for="partNo" class="form-label">
                                        <small class="fw-semibold asterisk">Part No</small>
                                    </label>
                                    <input type="text" class="form-control" id="partNo"
                                        aria-describedby="partNoHelp" placeholder="Enter Part No" name="part_no"
                                        required>
                                    <div id="partNoHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="made" class="form-label">
                                        <small class="fw-semibold">Made</small>
                                    </label>
                                    <input type="text" class="form-control" id="made"
                                        aria-describedby="madeHelp" placeholder="Enter made" name="made">
                                    <div id="madeHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="condition" class="form-label">
                                        <small class="fw-semibold">Condition</small>
                                    </label>
                                    <input type="url" class="form-control" id="condition"
                                        aria-describedby="conditionHelp" placeholder="Enter Product Condition"
                                        name="condition">
                                    <div id="conditionHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="application" class="form-label">
                                        <small class="fw-semibold asterisk">Application</small>
                                    </label>
                                    <input type="text" class="form-control" id="application"
                                        aria-describedby="applicationHelp" placeholder="Enter Application"
                                        name="application" required>
                                    <div id="applicationHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="uses" class="form-label">
                                        <small class="fw-semibold asterisk">Uses</small>
                                    </label>
                                    <input type="text" class="form-control" id="uses"
                                        aria-describedby="usesHelp" placeholder="Enter Uses" name="uses" required>
                                    <div id="usesHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="paymentOption" class="form-label">
                                        <small class="fw-semibold asterisk">Payment Option</small>
                                    </label>
                                    <input type="text" class="form-control" id="paymentOption"
                                        aria-describedby="paymentOptionHelp" placeholder="Enter Payment Option"
                                        name="paymentOption" required>
                                    <div id="paymentOptionHelp" class="form-text"></div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-2">
                                    <label for="productNote asterisk" class="form-label">
                                        <small class="fw-semibold">Product Note</small>
                                    </label>
                                    <textarea class="form-control" id="productNote" rows="8" aria-describedby="productNoteHelp"
                                        placeholder="Write Product Note Here..." name="product" required></textarea>
                                    <div id="productNoteHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="deliveryNote asterisk" class="form-label">
                                        <small class="fw-semibold">Devivery Note</small>
                                    </label>
                                    <textarea class="form-control" id="deliveryNote" rows="7" aria-describedby="deliveryNoteHelp"
                                        placeholder="Write Delivery Note Here..." name="delivery_note" required></textarea>
                                    <div id="deliveryNoteHelp" class="form-text"></div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn border-0 mb-3 px-3">
                                <i class="bi bi-send-fill"></i>
                                <small class="fw-semibold">Submit</small>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-expert" role="tabpanel" aria-labelledby="pills-expert-tab"
                    tabindex="0">
                    <h4 class="text-center my-3" style="color: var(--sky-blue);">Add Expert With XXXXX</h4>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="expertCategory" class="form-label">
                                        <small class="fw-semibold asterisk">Expert Category</small>
                                    </label>
                                    <select class="form-select select2" aria-label="Select Expert Category"
                                        aria-describedby="expertCategoryHelp" data-placeholder="Select Expert Category"
                                        name="expert_category_id" required>
                                        <option selected>Select Expert Category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <div id="expertCategoryHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="contactPersonName" class="form-label">
                                        <small class="fw-semibold asterisk">Contact Person Name</small>
                                    </label>
                                    <input type="text" class="form-control" id="contactPersonName"
                                        aria-describedby="contactPersonNameHelp" placeholder="Enter Contact person name"
                                        name="contact_person_name" required>
                                    <div id="contactPersonNameHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="email" class="form-label">
                                        <small class="fw-semibold asterisk">Email address</small>
                                    </label>
                                    <input type="email" class="form-control" id="email"
                                        aria-describedby="emailHelp" placeholder="example@gmail.com" name="email"
                                        required>
                                    <div id="emailHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="mobile" class="form-label">
                                        <small class="fw-semibold asterisk">Mobile</small>
                                    </label>
                                    <input type="number" class="form-control" id="mobile"
                                        aria-describedby="mobileHelp" placeholder="+880 17899 888888" name="mobile"
                                        required>
                                    <div id="mobileHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="whatsappNumber" class="form-label">
                                        <small class="fw-semibold asterisk">Whatsapp Number</small>
                                    </label>
                                    <input type="number" class="form-control" id="whatsappNumber"
                                        aria-describedby="whatsappNumberHelp" placeholder="+880 17899 888888"
                                        name="whatsapp_number" required>
                                    <div id="whatsappNumberHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="address" class="form-label">
                                        <small class="fw-semibold asterisk">Address</small>
                                    </label>
                                    <input type="text" class="form-control" id="address"
                                        aria-describedby="addressHelp" placeholder="Enter Your Address" name="address"
                                        required>
                                    <div id="addressHelp" class="form-text"></div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-2">
                                    <label for="googleMapDirection" class="form-label">
                                        <small class="fw-semibold">Google Map Direction</small>
                                    </label>
                                    <input type="url" class="form-control" id="googleMapDirection"
                                        aria-describedby="googleMapDirectionHelp"
                                        placeholder=" https://goo.gl/maps/WrgcUKFweVWuUpHHA" name="google_map_direction">
                                    <div id="googleMapDirectionHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="websiteLink" class="form-label">
                                        <small class="fw-semibold">Website Link</small>
                                    </label>
                                    <input type="url" class="form-control" id="websiteLink"
                                        aria-describedby="websiteLinkHelp" placeholder="https://www.example.com"
                                        name="website_link">
                                    <div id="websiteLinkHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="country" class="form-label">
                                        <small class="fw-semibold asterisk">Country</small>
                                    </label>
                                    <select class="form-select select2" aria-label="Select Country"
                                        aria-describedby="countryHelp" data-placeholder="Select Country" name="country"
                                        required>
                                        <option>Select country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh" selected>Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cabo Verde">Cabo Verde</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic (Czechia)">Czech Republic (Czechia)</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="DR Congo">DR Congo</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Eswatini">Eswatini</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Holy See">Holy See</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="North Korea">North Korea</option>
                                        <option value="North Macedonia">North Macedonia</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts & Nevis">Saint Kitts & Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="South Sudan">South Sudan</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="St. Vincent & Grenadines">St. Vincent & Grenadines</option>
                                        <option value="State of Palestine">State of Palestine</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    <div id="countryHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="city" class="form-label">
                                        <small class="fw-semibold asterisk">City</small>
                                    </label>
                                    <input type="text" class="form-control" id="city"
                                        aria-describedby="cityHelp" placeholder="Enter Your City" name="city"
                                        required>
                                    <div id="cityHelp" class="form-text"></div>
                                </div>

                                <div class="mb-2">
                                    <label for="description asterisk" class="form-label">
                                        <small class="fw-semibold">Description</small>
                                    </label>
                                    <textarea class="form-control" id="description" rows="4" aria-describedby="descriptionHelp"
                                        placeholder="Write Your Description Here..." name="description" required></textarea>
                                    <div id="descriptionHelp" class="form-text"></div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn border-0 mb-3 px-3">
                                <i class="bi bi-send-fill"></i>
                                <small class="fw-semibold">Submit</small>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-brand" role="tabpanel" aria-labelledby="pills-brand-tab"
                    tabindex="0">
                    <h4 class="text-center my-3" style="color: var(--sky-blue);">Add Your Brand With XXXXX</h4>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('custom_script')
    <!-- Custom script for this template -->
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    formData: {
                        contact_person_name: '',
                        email: '',
                        mobile: '',
                        whatsapp_number: '',
                        google_map_direction: '',
                        address: '',
                        website_link: '',
                        company_name: '',
                        company_email: '',
                        company_mobile: '',
                        company_description: '',
                        business_type: '',
                        business_category_id: '',
                        country: '',
                        city: '',
                    },
                    formTitle: 'Business Listing',
                    formSubtitle: 'Business listing in multiple steps',
                    nextButtonText: 'Next',
                    backButtonText: 'Previous',
                    finishButtonText: 'Submit',
                    stepSize: 'xs',
                    validateOnBack: false,
                    color: '#ff0c0e',
                    errorColor: '#8b0000',
                    shape: 'circle',
                    transition: '',
                    startIndex: 0
                };
            },
            methods: {
                onComplete() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Business List Submitted Successfully!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                },
                validateStep() {
                    if (this.formData.contact_person_name && this.formData.email) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        });

        const {
            FormWizard,
            TabContent
        } = window.Vue3FormWizard;
        app.component('form-wizard', FormWizard);
        app.component('tab-content', TabContent);

        app.mount('#app');
    </script>

    <script>
        $('#companyDescription').summernote({
            placeholder: 'Write Company Description Here...',
            tabsize: 2,
            height: 250,
            toolbar: [
                ['font-family', ['style', 'fontname', 'fontsize', 'fontsizeunit']],
                ['font-style', ['bold', 'italic', 'underline', 'strikethrough']],
                ['color', ['color', 'forecolor', 'backcolor']],
                ['font', ['superscript', 'subscript']],
                ['clear', ['clear']],
                ['para', ['ul', 'ol', 'paragraph', 'height']],
                ['insert', ['table', 'link', 'picture', 'video', 'hr']],
                ['view', ['fullscreen', 'codeview', 'help', 'undo', 'redo']]
            ]
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select An Option',
                width: '100%'
            });
        });
    </script>
@endsection
