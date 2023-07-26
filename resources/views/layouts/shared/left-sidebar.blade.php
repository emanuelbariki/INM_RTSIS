<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <div class="sidebar-content">

        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

                <div>
                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>


        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : null }}">
                        <i class="ph-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{--  Layout  --}}
                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">ENDPOINTS</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>

                <li class="nav-item nav-item-submenu nav-item-expanded nav-item-open">
                    <a href="#" class="nav-link">
                        <i class="ph-layout"></i>
                        <span>Equity Data</span>
                    </a>

                    <ul class="nav-group-sub collapse show">
                        <li class="nav-item"><a href="#" class="nav-link">Payable</a></li>
                        <li class="nav-item"><a href="#" class="nav-link active">Capital</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Other capital Account</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Core capital deductions</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-layout"></i>
                        <span>Liabilities Data</span>
                    </a>

                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="#" class="nav-link">Digital Savings</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">inter Branch Float Item</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Bankers Cheques</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Transfers Payable</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Accrued Taxes</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Subordinated Debt</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Unearned Income</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Outstanding Acceptances</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Deposit Information</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Borrowings Information</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Interbank Loan Payable</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Other</a></li>
                    </ul>
                </li>


                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-layout"></i>
                        <span>Assets Data</span>
                    </a>

                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="#" class="nav-link">Assets ownned</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Equity Investment </a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Investiment Debt Securities</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Other Asset</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Cash Information</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Balance Bot</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Balance Other Banks</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Balance MNO </a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Interbank Loans Receivable </a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Loan</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">InterBranch Float Item</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Overdraft</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Claim Treasury</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Institution Premises</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Customer Liabilities</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Cheques</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Commercial Other Bills Purchased</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Underwriting Accounts</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Digital Credit</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Microfinance Segment Loans</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Premises Furniture Equipment</a></li>
                    </ul>
                </li>


                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-layout"></i>
                        <span>Off Balance Sheet Data</span>
                    </a>

                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="#" class="nav-link">Outstanding Guarantees</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Export Letters Credit</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Outstanding Letters Credit</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Inward Bills</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Outward Bills</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Bought Forward Exchange</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sold Forward Exchange</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Trust Fiduciary Account</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Safekeeping Heald Item</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Accounts Unsold</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Late Deposit Payments</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Cheque Unsold</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Securities Sold</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Securities Purchased</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Undrawn Balance</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Pre-Operating Expenses</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Currency Swap</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Interest Rate Swap</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Equity Derivatives</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Interest Rate Futures</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Income Statement</a></li>
                    </ul>
                </li>


                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-layout"></i>
                        <span>Other Banks Data</span>
                    </a>

                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="#" class="nav-link">individual Information</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Company Information</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Interest Trust Account</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Internet Banking</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Mobile Banking</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Foreignterm Debt</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">ifem Transaction</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">ifem Quotes</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">ibcm Transaction</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Treasury bond Transaction</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Account Category</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Bank Funds Transfer</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">MNO Funds Transfer</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Branch Information</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Agent Information</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Agent Transaction</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Complaint Fraud Statistics</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">POS Information</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">POS Transaction</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">ATM Information</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">ATM Transaction</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Card Transaction</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Remittances</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Written Off loans</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-layout"></i>
                        <span>Bank Assurance Data </span>
                    </a>

                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="#" class="nav-link">Insurance Underwritting</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Insurance Claim</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Insurance Commission</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Complaints Fraud Statistics</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</div>
