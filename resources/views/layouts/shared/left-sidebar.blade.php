<style>
    .left-side-menu {
        width: 240px;
        background: #ffffff;
        bottom: 0;
        padding: 20px 0;
        position: fixed;
        transition: all 0.1s ease-out;
        top: 70px;
        box-shadow: 0 0 35px 0 rgba(154, 161, 171, 0.15);
    }
</style>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="#assetsData" data-toggle="collapse">
                        <i data-feather="chevrons-right"></i>
                        <span> Assets Data </span>
                    </a>
                    <div class="collapse" id="assetsData">
                        <ul class="nav-second-level">
                            <li>
                                

                                <a href="{{ route('balanceWithOtherBanks') }}">Balance With Other Banks <span class="badge text-white bg-success float-end">Done</span></a>
                            </li>
                            <li>
                                <a href="{{ route('balanceBot') }}">Balance Bot <span class="badge text-white bg-success float-end">Done</span></a>
                            </li>
                            <li>
                                <a href="{{ route('assetOwned') }}">Asset Owned</a>
                            </li>
                            <li>
                                <a href="{{ route('equityInvestment') }}">Equity Investment</a>
                            </li>
                            <li>
                                <a href="{{ route('invDebtSecurities') }}">Inv Debt Securities</a>
                            </li>
                            <li>
                                <a href="{{ route('otherAsset') }}">Other Asset <span class="badge text-white bg-success float-end">Done</span></a>
                            </li>
                            <li>
                                <a href="{{ route('cashInformation') }}">Cash Information</a>
                            </li>
                            <li>
                                <a href="{{ route('interbankLoansReceivable') }}">Interbank Loans Receivable</a>
                            </li>
                            <li>
                                <a href="{{ route('loan') }}">Loan</a>
                            </li>
                            <li>
                                <a href="{{ route('interBranchFloatItem') }}">Inter Branch Float Item</a>
                            </li>
                            <li>
                                <a href="{{ route('overdraft') }}">Overdraft</a>
                            </li>
                            <li>
                                <a href="{{ route('claimTreasury') }}">Claim Treasury</a>
                            </li>
                            <li>
                                <a href="{{ route('institutionPremises') }}">Institution Premises</a>
                            </li>
                            <li>
                                <a href="{{ route('customerLiabilities') }}">Customer Liabilities</a>
                            </li>
                            <li>
                                <a href="{{ route('cheques') }}">Cheques <span class="badge text-white bg-success float-end">Done</span></a>
                            </li>
                            <li>
                                <a href="{{ route('commercialOtherBillsPurchased') }}">Commercial Other Bills
                                    Purchased</a>
                            </li>
                            <li>
                                <a href="{{ route('underwritingAccounts') }}">Underwriting Accounts</a>
                            </li>
                            <li>
                                <a href="{{ route('digitalCredit') }}">Digital Credit</a>
                            </li>
                            <li>
                                <a href="{{ route('microfinanceSegmentLoans') }}">Microfinance Segment Loans</a>
                            </li>
                            <li>
                                <a href="{{ route('premisesFurnitureEquipment') }}">Premises Furniture Equipment</a>
                            </li>
                        </ul>
                    </div>
                </li>

                

                <li>
                    <a href="#BankOthers" data-toggle="collapse">
                        <i data-feather="chevrons-right"></i>
                        {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                        <span> Bank Others </span>
                    </a>
                    <div class="collapse" id="BankOthers">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('accountCategory') }}">Account Category <span class="badge text-white bg-success float-end">Done</span></a>
                            </li>
                            <li>
                                <a href="{{ route('atmInformation') }}">ATM Information <span class="badge text-white bg-success float-end">Done</span></a>
                            </li>
                            <li>
                                <a href="{{ route('atmTransaction') }}">ATM Transaction <span class="badge text-white bg-success float-end">Done</span></a>
                            </li>
                            <li>
                                <a href="{{ route('branchInformation') }}">Branch Information <span class="badge text-white bg-success float-end">Done</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#EquityData" data-toggle="collapse">
                        <i data-feather="chevrons-right"></i>
                        {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                        <span> Equity Data </span>
                    </a>
                    <div class="collapse" id="EquityData">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('coreCapitalDeductions') }}">Core Capital Deductions <span class="badge text-white bg-success float-end">Done</span></a>
                            </li>
                            <li>
                                <a href="{{ route('dividendsPayable') }}">Dividends Payable</a>
                            </li>
                            <li>
                                <a href="{{ route('shareCapital') }}">Share Capital </a>
                            </li>
                            <li>
                                <a href="{{ route('otherCapitalAccount') }}">Other Capital Account</a>
                            </li>
                        </ul>
                    </div>
                </li>

                
                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="{{ route('second', ['apps', 'calendar']) }}">
                        <i data-feather="calendar"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('second', ['apps', 'chat']) }}">
                        <i data-feather="message-square"></i>
                        <span> Chat </span>
                    </a>
                </li> --}}

                <li class="menu-title">V 0.0.1</li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
