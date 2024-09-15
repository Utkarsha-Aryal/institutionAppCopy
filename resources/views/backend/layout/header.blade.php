<header class="app-header">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="index.html" class="header-logo">
                        <img src="{{asset("/assets/images/brand-logos/desktop-logo.png")}}" )}}" alt="logo" class="desktop-logo">
                        <img src="{{asset("/assets/images/brand-logos/toggle-logo.png")}}" )}}" alt="logo" class="toggle-logo">
                        <img src="{{asset("/assets/images/brand-logos/desktop-white.png")}}" )}}" alt="logo" class="desktop-white">
                        <img src="{{asset("/assets/images/brand-logos/toggle-white.png")}}" )}}" alt="logo" class="toggle-white">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);">
                    <i class="header-icon fe fe-align-left"></i>
                </a>
                <div class="main-header-center d-none d-lg-block">
                    <input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fa fa-search d-none d-md-block"></i></button>
                </div>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">

            <div class="header-element Search-element d-block d-lg-none">
                <!-- Start::header-link|dropdown-toggle -->
               
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu dropdown-menu-end Search-element-dropdown" data-popper-placement="none">
                    <li>
                        <div class="input-group w-100 p-2"> 
                            <input type="text" class="form-control" placeholder="Search....">
                            <div class="btn btn-primary"> 
                                <i class="fa fa-search" aria-hidden="true"></i> 
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Start::header-element -->
            <div class="header-element country-selector">
                <!-- Start::header-link|dropdown-toggle -->
              
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu dropdown-menu-end country-dropdown" data-popper-placement="none">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span>
                                <img src="{{asset("/assets/images/flags/french_flag.jpg")}}" alt="img" class="avatar avatar-xs lh-1 me-2">
                            </span>
                            French
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span>
                                <img src="{{asset("/assets/images/flags/germany_flag.jpg")}}" alt="img" class="avatar avatar-xs lh-1 me-2">
                            </span>
                            German
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span>
                                <img src="{{asset("/assets/images/flags/italy_flag.jpg")}}" alt="img" class="avatar avatar-xs lh-1 me-2">
                            </span>
                            Italian
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span>
                                <img src="{{asset("/assets/images/flags/russia_flag.jpg")}}" alt="img" class="avatar avatar-xs lh-1 me-2">
                            </span>
                            Russian
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span>
                                <img src="{{asset("/assets/images/flags/spain_flag.jpg")}}" alt="img" class="avatar avatar-xs lh-1 me-2">
                            </span>
                            Spanish
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a href="javascript:void(0);" class="header-link layout-setting">
                    <span class="light-layout">
                        <!-- Start::header-link-icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
                        <!-- End::header-link-icon -->
                    </span>
                    <span class="dark-layout">
                        <!-- Start::header-link-icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
                        <!-- End::header-link-icon -->
                    </span>
                </a>
                <!-- End::header-link|layout-setting -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element messages-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
            
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu dropdown-menu-end main-header-message" data-popper-placement="none">
                    <div class="menu-header-content bg-primary text-fixed-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 fs-15 fw-semibold text-fixed-white">Messages</h6>
                            <span class="badge rounded-pill bg-warning pt-1 text-fixed-black">Mark All Read</span>
                        </div>
                        <p class="dropdown-title-text subtext mb-0 text-fixed-white op-6 pb-0 fs-12 ">You have 4 unread messages</p>
                    </div>
                    <div><hr class="dropdown-divider"></div>
                    <ul class="list-unstyled mb-0" id="header-cart-items-scroll">
                        <li class="dropdown-item">
                            <div class="d-flex messages">
                                <span class="avatar avatar-md me-2 online avatar-rounded flex-shrink-0">
                                    <img src="{{asset("/assets/images/faces/12.jpg")}}" alt="img">
                                </span>
                                <div>
                                    <div class="d-flex">
                                        <a href="chat.html"><h6 class="mb-1 name">Petey Cruiser</h6></a>
                                    </div>
                                    <p class="mb-0 fs-12 desc">I'm sorry but i'm not sure how to help you with that......</p>
                                    <p class="time mb-0 text-start float-start ms-2 mt-2">Mar 15 3:55 PM</p>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex messages">
                                <span class="avatar avatar-md me-2 online avatar-rounded flex-shrink-0">
                                    <img src="{{asset("/assets/images/faces/3.jpg")}}" alt="img">
                                </span>
                                <div>
                                    <div class="d-flex">
                                        <a href="chat.html"><h6 class="mb-1 name">Jimmy Changa</h6></a>
                                    </div>
                                    <p class="mb-0 fs-12 desc">All set ! Now, time to get to you now......</p>
                                    <p class="time mb-0 text-start float-start ms-2 mt-2">Mar 06 01:12 AM</p>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex messages">
                                <span class="avatar avatar-md me-2 online avatar-rounded flex-shrink-0">
                                    <img src="{{asset("/assets/images/faces/5.jpg")}}" alt="img">
                                </span>
                                <div>
                                    <div class="d-flex">
                                        <a href="chat.html"><h6 class="mb-1 name">Graham Cracker</h6></a>
                                    </div>
                                    <p class="mb-0 fs-12 desc">Are you ready to pickup your Delivery...</p>
                                    <p class="time mb-0 text-start float-start ms-2 mt-2">Feb 25 10:35 AM</p>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex messages">
                                <span class="avatar avatar-md me-2 online avatar-rounded flex-shrink-0">
                                    <img src="{{asset("/assets/images/faces/4.jpg")}}" alt="img">
                                </span>
                                <div>
                                    <div class="d-flex">
                                        <a href="chat.html"><h6 class="mb-1 name">Donatella Nobatti</h6></a>
                                    </div>
                                    <p class="mb-0 fs-12 desc">Here are some products ...</p>
                                    <p class="time mb-0 text-start float-start ms-2 mt-2">Feb 12 05:12 PM</p>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex messages">
                                <span class="avatar avatar-md me-2 online avatar-rounded flex-shrink-0">
                                    <img src="{{asset("/assets/images/faces/1.jpg")}}" alt="img">
                                </span>
                                <div>
                                    <div class="d-flex">
                                        <a href="chat.html"><h6 class="mb-1 name">Anne Fibbiyon</h6></a>
                                    </div>
                                    <p class="mb-0 fs-12 desc">I'm sorry but i'm not sure how...</p>
                                    <p class="time mb-0 text-start float-start ms-2 mt-2">Jan 29 03:16 PM</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="text-center dropdown-footer">
                        <a href="checkout.html" class="text-primary fs-13">VIEW ALL</a>
                    </div>
                </div>
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element notifications-dropdown main-header-notification">
                <!-- Start::header-link|dropdown-toggle -->
                
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu dropdown-menu-end main-header-message" data-popper-placement="none">
                    <div class="menu-header-content bg-primary text-fixed-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 fs-15 fw-semibold text-fixed-white">Notifications</h6>
                            <span class="badge rounded-pill bg-warning pt-1 text-fixed-black">Mark All Read</span>
                        </div>
                        <p class="dropdown-title-text subtext mb-0 text-fixed-white op-6 pb-0 fs-12 ">You have 4 unread Notifications</p>
                    </div>
                    <div><hr class="dropdown-divider"></div>
                    <ul class="list-unstyled mb-0" id="header-notification-scroll">
                        <li class="dropdown-item px-3">
                            <div class="d-flex">
                                <span class="avatar avatar-md me-2 avatar-rounded flex-shrink-0 bg-pink">
                                    <i class="la la-file-alt fs-20"></i>
                                </span>
                                <div class="ms-3">
                                    <a href="mail.html"><h5 class="notification-label text-dark mb-1">New files available</h5></a>
                                    <div class="notification-subtext">10 hour ago</div>
                                </div>
                                <div class="ms-auto" >
                                    <a href="mail.html"><i class="las la-angle-right text-end text-muted icon"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item px-3">
                            <div class="d-flex">
                                <span class="avatar avatar-md me-2 avatar-rounded flex-shrink-0 bg-purple">
                                    <i class="la la-gem fs-20"></i>
                                </span>
                                <div class="ms-3">
                                    <a href="mail.html"><h5 class="notification-label text-dark mb-1">Updates Available</h5></a>
                                    <div class="notification-subtext">2 days ago</div>
                                </div>
                                <div class="ms-auto" >
                                    <a href="mail.html"><i class="las la-angle-right text-end text-muted icon"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item px-3">
                            <div class="d-flex">
                                <span class="avatar avatar-md me-2 avatar-rounded flex-shrink-0 bg-success">
                                    <i class="la la-shopping-basket fs-20"></i>
                                </span>
                                <div class="ms-3">
                                    <a href="mail.html"><h5 class="notification-label text-dark mb-1">New Order Received</h5></a>
                                    <div class="notification-subtext">1 hour ago</div>
                                </div>
                                <div class="ms-auto" >
                                    <a href="mail.html"><i class="las la-angle-right text-end text-muted icon"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item px-3">
                            <div class="d-flex">
                                <span class="avatar avatar-md me-2 avatar-rounded flex-shrink-0 bg-warning">
                                    <i class="la la-envelope-open fs-20 text-fixed-white"></i>
                                </span>
                                <div class="ms-3">
                                    <a href="mail.html"><h5 class="notification-label text-dark mb-1">New review received</h5></a>
                                    <div class="notification-subtext">1 day ago</div>
                                </div>
                                <div class="ms-auto" >
                                    <a href="mail.html"><i class="las la-angle-right text-end text-muted icon"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item px-3">
                            <div class="d-flex">
                                <span class="avatar avatar-md me-2 avatar-rounded flex-shrink-0 bg-danger">
                                    <i class="la la-user-check fs-20"></i>
                                </span>
                                <div class="ms-3">
                                    <a href="mail.html"><h5 class="notification-label text-dark mb-1">22 verified registrations</h5></a>
                                    <div class="notification-subtext">2 hour ago</div>
                                </div>
                                <div class="ms-auto" >
                                    <a href="mail.html"><i class="las la-angle-right text-end text-muted icon"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item px-3">
                            <div class="d-flex">
                                <span class="avatar avatar-md me-2 avatar-rounded flex-shrink-0 bg-primary">
                                    <i class="la la-check-circle fs-20"></i>
                                </span>
                                <div class="ms-3">
                                    <a href="mail.html"><h5 class="notification-label text-dark mb-1">Project has been approved</h5></a>
                                    <div class="notification-subtext">4 hour ago</div>
                                </div>
                                <div class="ms-auto" >
                                    <a href="mail.html"><i class="las la-angle-right text-end text-muted icon"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="text-center dropdown-footer">
                        <a href="checkout.html" class="text-primary fs-13">VIEW ALL</a>
                    </div>
                </div>
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-fullscreen">
                <!-- Start::header-link -->
                <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="full-screen-open full-screen-icon header-link-icon" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="full-screen-close full-screen-icon header-link-icon d-none" fill="currentColor" height="24" viewBox="0 -960 960 960" width="24"><path d="M320-200v-120H200v-80h200v200h-80Zm240 0v-200h200v80H640v120h-80ZM200-560v-80h120v-120h80v200H200Zm360 0v-200h80v120h120v80H560Z"/></svg>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-sidebar">
                <!-- Start::header-link-->
               
                <!-- End::header-link-->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element headerProfile-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <img src="{{asset("/assets/images/faces/6.jpg")}}" alt="img" width="37" height="37" class="rounded-circle">
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 header-profile-dropdown dropdown-menu-end main-profile-menu" aria-labelledby="mainHeaderProfile">
                    <li>
                        <div class="main-header-profile bg-primary menu-header-content text-fixed-white">
                            <div class="my-auto">
                                <h6 class="mb-0 lh-1 text-fixed-white">Petey Cruiser</h6><span class="fs-11 op-7 lh-1">Premium Member</span>
                            </div>
                        </div>
                    </li>
                    {{-- <li><a class="dropdown-item d-flex" href="profile.html"><i class="bx bx-user-circle fs-18 me-2 op-7"></i>Profile</a></li>
                    <li><a class="dropdown-item d-flex" href="editprofile.html"><i class="bx bx-cog fs-18 me-2 op-7"></i>Edit Profile </a></li>
                    <li><a class="dropdown-item d-flex border-block-end" href="mail.html"><i class="bx bxs-inbox fs-18 me-2 op-7"></i>Inbox</a></li>
                    <li><a class="dropdown-item d-flex" href="chat.html"><i class="bx bx-envelope fs-18 me-2 op-7"></i>Messages</a></li>
                    <li><a class="dropdown-item d-flex border-block-end" href="editprofile.html"><i class="bx bx-slider-alt fs-18 me-2 op-7"></i>Account Settings</a></li> --}}
                    <li><a class="dropdown-item d-flex" href="/logout"><i class="bx bx-log-out fs-18 me-2 op-7"></i>Sign Out</a></li>
                </ul>
            </div>  


            
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
              
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

</header>
<!-- /app-header -->