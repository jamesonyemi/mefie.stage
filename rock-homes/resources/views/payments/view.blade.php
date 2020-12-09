@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>View Payment Details</h3>
            </div>
            <hr>
    <div class="card-body">
        @foreach ($get_payments as $payment)
                <form class="mt-4" >
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Client</label>
                            @foreach ($client_info as $client)
                            {{-- @if ( ($payment->clientid === $item->clientid) || ($payment->pid === $item->pid) ) --}}
                                <div id="clientid" name="clientid" class="list-group-item">
                                    {{ old('clientid', ucfirst( $client->client_name ) ) }}
                                </div>
                                {{-- @endif --}}
                                @endforeach
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Project</label>
                            @foreach ($project_info as $project)
                            <div id="pid" name="pid" class="list-group-item">
                                {{ old('pid', ( $project->title ) ) }}
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="amt">Amount Received</label>
                            <div id="amt_received" name="amt_received" class="list-group-item">
                                {{ empty($payment->amt_received) ? 'No value' :
                                 old('amt_received', number_format($payment->amt_received, 2)) }}
                            </div>
                        </div>
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-4">
                            <label for="title">Payment Mode</label>
                            <div id="paymentmode" name="paymentmode" class="list-group-item">
                                {{ empty($payment->paymentmode) ? 'No value' : old('paymentmode', $payment->paymentmode) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Bank Name</label>
                            <div  id="bankname" name="bankname" class="list-group-item" >
                                {{ empty($payment->bankname) ? 'No value' : old('amt_received', $payment->bankname) }}
                            </div>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Bank Branch</label>
                            <div  id="bankbranch" name="bankbranch" class="list-group-item">
                                {{ empty($payment->bankbranch) ? 'No value' :   old('bankbranch', $payment->bankbranch) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Payment Date</label>
                            <div  id="paymentdate" name="paymentdate" class="list-group-item" >
                            {{ empty($payment->paymentdate) ? 'No value' :  old('paymentdate', str_replace('-', '/', $payment->paymentdate)) }}
                            </div>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Cheque Number</label>
                            <div  id="chequeno" name="chequeno" class="list-group-item">
                                {{ empty($payment->chequeno) ? 'No value' :  old('chequeno', $payment->chequeno) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Comment</label>
                            <div  id="receivedby" name="receivedby" class="list-group-item" >
                                {{ old('comments', $payment->comments) }}
                            </div>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Received From</label>
                            <div  id="receivedfrom" name="receivedfrom" class="list-group-item">
                                {{ old('receivedfrom', $payment->receivedfrom) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        {{-- <div class="form-group col-md-4">
                            <label for="project_state">Comments</label>
                            <div  id="comments" name="comments" class="list-group-item">
                                {{ old('comments', $payment->comments) }}
                            </div>
                        </div> --}}
                        <div class="form-group col-md-8"></div>

                    </div>
                      @endforeach
                </form>
                <br><br>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
