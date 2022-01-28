<?php
    preg_match('/([a-z]*)@/i', Route::getCurrentRoute()->getActionName(), $matches);
    $controller = $matches[1];
    $action = explode('@', Route::getCurrentRoute()->getActionName())[1];
?>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark">
    <!-- BEGIN: Aside Menu -->
    <div 
        id="m_ver_menu" 
        class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
        data-menu-vertical="true"
        data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
    >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow " data-controller="">
        <!-- <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{route('customers.index')}}" class="m-menu__link @if(($controller=='CustomersController' && $action=='index') || 
                ($controller=='CustomersController' &&$action=='view') || 
                ($controller=='CustomersController' &&$action=='edit') || 
                ($controller=='CustomersController' && $action=='add') )  active @endif">
                    <i class="m-menu__link-icon flaticon-settings"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Home
                            </span>
                        </span>
                    </span>
                </a>
            </li> -->
            <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{route('customers.index')}}" class="m-menu__link @if(($controller=='CustomersController' && $action=='index') || 
                ($controller=='CustomersController' &&$action=='view') || 
                ($controller=='CustomersController' &&$action=='edit') || 
                ($controller=='CustomersController' && $action=='add') )  active @endif">
                    <i class="m-menu__link-icon flaticon-users"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                               CUSTOMER DETAILS
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{route('payments.index')}}" class="m-menu__link @if(($controller=='PaymentsController' && $action=='index') || 
                ($controller=='PaymentsController' &&$action=='view') || 
                ($controller=='PaymentsController' &&$action=='edit') || 
                ($controller=='PaymentsController' && $action=='add') )  active @endif">
                    <i class="m-menu__link-icon flaticon-file"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                PAYMENT DETAILS
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true" >
                <a  href="{{route('customers.index')}}" class="m-menu__link @if(($controller=='CustomersController' && $action=='index') || 
                ($controller=='CustomersController' &&$action=='view') || 
                ($controller=='CustomersController' &&$action=='edit') || 
                ($controller=='CustomersController' && $action=='add') )  active @endif">
                    <i class="m-menu__link-icon flaticon-interface"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                BLOCK DETAILS
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true" >
            <a href="<?php echo url('/adminusers/logout'); ?>" class="m-menu__link">
              
                    <i class="m-menu__link-icon flaticon-logout"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                LOGOUT
                            </span>
                        </span>
                    </span>
                </a>
            </li>
           
            
            
           
            
             
           
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>