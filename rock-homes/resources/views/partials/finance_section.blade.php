<li class="{{ request()->is('/admin-portal/payments*/') ? 'nav-item mm-active' : 'nav-item' }} ---raise-button-icons" >
                        <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                            <span class="icon" ><i class='bx bx-sm ml-1'>₵</i></span>
                            <span class="menu-title bx-sm ml-1" > Payments</span>
                        </a>
        
                        <ul class="sidemenu-nav-second-level">
                            <li class="{{ Request::url() == url('/admin-portal/payments/create') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/payments/create') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-plus' ></i></span>
                                    <span class="menu-title">Add New Payment</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/cost-of-project') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/cost-of-project') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-show'></i></span>
                                    <span class="menu-title">View Cost of Project</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/print-payments-made-by-client') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/print-payments-made-by-client') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-printer' ></i></span>
                                    <span class="menu-title">Print Payment</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/payments') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/payments') }}" class="nav-link">
                                    <span class="icon"><i class="bx bx-wallet" ></i></span>
                                    <span class="menu-title">All Payments</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == url('/admin-portal/additional-cost') ? 'nav-item mm-active' : 'nav-item' }}">
                                <a href="{{ url('/admin-portal/additional-cost') }}" class="nav-link">
                                    <span class="icon"><i class='bx bx-list-plus' ></i></span>
                                    <span class="menu-title">Additional Cost</span>
                                </a>
                            </li>
                        </ul>
                    </li>