<div class="tab-pane fade show active animate__animated animate__slideInRight" id="settings" role="tabpanel" aria-labelledby="settings-tab">
  <div class="card user-settings-box mb-30">
      <div class="card-body">
              <h3><i class='bx bx-user-circle'></i> Personal Info
                <span class="ml-2 " >
                    <i class='invisible text-white bx bx-message-rounded-edit bx-pencil'
                    data-placement="top" data-toggle="tooltip" title="Update my Personal info" type="button"
                    style="background-color: #293754;" >
                    <button class="invisible btn btn-indigo btn-icon"></button>
                </i>
                </span>
              </h3>

              <div class="row">
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>First Name</label>
                          <input 
                                disabled
                                type="text"
                                class="form-control text-capitalize" 
                                placeholder="Enter first name" 
                                value="{!! Auth::user()->first_name !!}"                           
                            />
                      </div>
                  </div>
                  
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Last Name</label>
                          <input 
                                disabled
                                type="text"
                                class="form-control text-capitalize" 
                                value="{!! Auth::user()->last_name !!}"
                            />
                      </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Middle Name</label>
                          <input
                                disabled 
                                type="text"
                                class="form-control text-capitalize" 
                                value="{!! Auth::user()->middle_name !!}"
                                
                            />
                      </div>
                  </div>

                  <div class="col-lg-12" hidden>
                      <div class="form-group">
                          <label>Bio</label>
                          <textarea cols="30" rows="5" placeholder="Write something..." class="form-control"></textarea>
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group">
                          <label>Joined Date</label>
                          <input
                                disabled 
                                type="text"
                                class="form-control text-capitalize" 
                                value="{{ date('l, jS F, Y', strtotime( Auth::user()->created_at))  }}"
                                
                            />
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group">
                          <label>Last Updated</label>
                          <input
                                disabled 
                                type="text"
                                class="form-control" 
                                value="{{ date('l, jS F, Y', strtotime( Auth::user()->updated_at))  }}"
                                
                            />
                      </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Email Address</label>
                          <input
                                disabled 
                                type="text"
                                class="form-control" 
                                value="{!! Auth::user()->email !!}"
                                
                            />
                          <span class="invisible form-text text-muted d-block">
                              <small>If you want to change email please <a href="#" class="d-inline-block">click</a> here.</small>
                          </span>
                      </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Phone Number</label>
                          <input
                                disabled 
                                type="text"
                                class="form-control" 
                                value="{!! Auth::user()->contact_details !!}"
                                
                            />
                          <span class="invisible form-text text-muted d-block">
                              <small>If you want to change phone number please <a href="#" class="d-inline-block">click</a> here.</small>
                          </span>
                      </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="form-group">
                          <label>Visibility</label>
                          <input 
                                disabled
                                type="text" 
                                class="form-control" 
                                value="{!! Auth::user()->active !!}"
                                placeholder="Enter password"
                          />
                          <span class="invisible form-text text-muted d-block">
                              <small>If you want to change password please <a href="#" class="d-inline-block">click</a> here.</small>
                          </span>
                      </div>
                  </div>
              </div>
              <hr>
              <div class="invisible" hidden>
                  <h3><i class='bx bx-building'></i> Company Info
                    <span class="ml-2 " >
                        <i class='text-white bx bx-message-rounded-edit bx-pencil'
                        data-placement="top" data-toggle="tooltip" title="Update Company Info" type="button"
                        style="background-color: #293754;" >
                        <button class="invisible btn btn-indigo btn-icon"></button>
                    </i>
                    </span>
                </h3>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label>Company Name</label>
                              <input type="text" class="form-control" placeholder="Enter company name">
                          </div>
                      </div>
    
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label>Website</label>
                              <input type="text" class="form-control" placeholder="Enter website url">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="invisible" hidden>
                  <h3><i class='bx bx-world bg-dark'></i> Social</h3>
                  <div class="row" >
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Facebook</label>
                              <input type="text" class="form-control" placeholder="Enter facebook url">
                          </div>
                      </div>
    
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Twitter</label>
                              <input type="text" class="form-control" placeholder="Enter twitter url">
                          </div>
                      </div>
    
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Instagram</label>
                              <input type="text" class="form-control" placeholder="Enter instagram url">
                          </div>
                      </div>
    
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Linkedin</label>
                              <input type="text" class="form-control" placeholder="Enter linkedin url">
                          </div>
                      </div>
    
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Pinterest</label>
                              <input type="text" class="form-control" placeholder="Enter pinterest url">
                          </div>
                      </div>
    
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label>Stack Overflow</label>
                              <input type="text" class="form-control" placeholder="Enter stack overflow url">
                          </div>
                      </div>
                  </div>
              </div>
      </div>
  </div>
</div>