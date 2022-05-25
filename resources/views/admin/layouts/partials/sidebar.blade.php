<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">

                <div class="menu-item">
                    <a class="menu-link {{ Route::is('admin.admin') ? 'active' : '' }}" href="{{ route('admin.admin') }}">
                        <span class="menu-icon">
                            <i class="fa fa-chart-pie me-2"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
            
                <div data-kt-menu-trigger="click" class="menu-item {{ Route::is('admin.user*') || Route::is('admin.permission*') || Route::is('admin.role*') ? 'show' : '' }} menu-accordion mb-1">
                    <span class="menu-link {{ Route::is('admin.user*') || Route::is('admin.permission*') || Route::is('admin.role*') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="fa fa-shield-alt"></i>
                        </span>
                        <span class="menu-title">User Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        @can('user-view')
                        <div class="menu-item {{ Route::is('admin.user*') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.user') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">User</span>
                            </a>
                        </div>
                        @endcan
                        @can('role-view')
                        <div class="menu-item {{ Route::is('admin.role*') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.role') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Role</span>
                            </a>
                        </div>
                        @endcan
                        @can('permission-view')
                        <div class="menu-item {{ Route::is('admin.permission*') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.permission') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Permissions</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item {{ Route::is('admin.student*') ? 'show' : '' }} menu-accordion mb-1">
                    <span class="menu-link {{ Route::is('admin.student*') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="fa fa-user-graduate me-2"></i>
                        </span>
                        <span class="menu-title">Student</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        @can('user-view')
                        <div class="menu-item {{ Route::is('admin.student') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.student') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Index</span>
                            </a>
                        </div>
                        @endcan
                        @can('role-view')
                        <div class="menu-item {{ Route::is('admin.student.create') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.student.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Add Student</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item {{ Route::is('admin.course*') || Route::is('admin.batch*') ? 'show' : '' }} menu-accordion mb-1">
                    <span class="menu-link {{ Route::is('admin.course*') || Route::is('admin.batch*') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="fa fa-graduation-cap me-2"></i>
                        </span>
                        <span class="menu-title">Course</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        @can('course-view')
                        <div class="menu-item {{ Route::is('admin.course') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.course') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Index</span>
                            </a>
                        </div>
                        @endcan
                        @can('course-create')
                        <div class="menu-item {{ Route::is('admin.student.create') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.student.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Add Course</span>
                            </a>
                        </div>
                        @endcan
                        @can('batch-view')
                        <div class="menu-item {{ Route::is('admin.batch') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.batch') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Batch</span>
                            </a>
                        </div>
                        @endcan
                        @can('group-view')
                        <div class="menu-item {{ Route::is('admin.group') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.group') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Group</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item {{ Route::is('admin.subject*') || Route::is('admin.lesson') ? 'show' : '' }} menu-accordion mb-1">
                    <span class="menu-link {{ Route::is('admin.subject*') || Route::is('admin.lesson') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="fa fa-book-open me-2"></i>
                        </span>
                        <span class="menu-title">Subject</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        @can('subject-view')
                        <div class="menu-item {{ Route::is('admin.subject') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.subject') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Index</span>
                            </a>
                        </div>
                        @endcan
                        @can('subject-create')
                        <div class="menu-item {{ Route::is('admin.student.create') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.student.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Add Subject</span>
                            </a>
                        </div>
                        @endcan
                        @can('subject-view')
                        <div class="menu-item {{ Route::is('admin.lesson') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.lesson') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lesson</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item {{ Route::is('admin.question*') ? 'show' : '' }} menu-accordion mb-1">
                    <span class="menu-link {{ Route::is('admin.question*') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="fa fa-question me-2"></i>
                        </span>
                        <span class="menu-title">Question</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        @can('question-view')
                        <div class="menu-item {{ Route::is('admin.question') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.question') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Index</span>
                            </a>
                        </div>
                        @endcan
                        @can('question-type-view')
                        <div class="menu-item {{ Route::is('admin.question.type') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.question.type') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Types</span>
                            </a>
                        </div>
                        @endcan
                        @can('question-create')
                        <div class="menu-item {{ Route::is('admin.question.create') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.question.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Add Question</span>
                            </a>
                        </div>
                        @endcan
                        @can('question-assign')
                        <div class="menu-item {{ Route::is('admin.question.assign') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.question.assign') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Assign</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item {{ Route::is('admin.test*') ? 'show' : '' }} menu-accordion mb-1">
                    <span class="menu-link {{ Route::is('admin.test*') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="fa fa-clipboard-list me-2"></i>
                        </span>
                        <span class="menu-title">Test</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        @can('test-view')
                        <div class="menu-item {{ Route::is('admin.test') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.test') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Index</span>
                            </a>
                        </div>
                        @endcan
                        @can('test-create')
                        <div class="menu-item {{ Route::is('admin.test.create') ? 'show' : '' }}">
                            <a class="menu-link" href="{{ route('admin.test.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create Test</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <!--begin::Aside Toolbarl-->
    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
        <!--begin::Aside user-->
        <!--begin::User-->
        <div class="aside-user d-flex align-items-sm-center justify-content-center py-4">
            <!--end::Symbol-->
            <!--begin::Wrapper-->
            <div class="aside-user-info flex-row-fluid flex-wrap ">
                <!--begin::Section-->
                <div class="d-flex">
                    <!--begin::Info-->
                    <div class="flex-grow-1 me-2">
                        <!--begin::Username-->
                        <a href="#" class="text-white text-hover-primary fs-6 fw-bold">{{ auth()->user()->name }}</a>
                        <!--end::Username-->
                        <!--begin::Description-->
                        <span class="text-gray-600 fw-bold d-block fs-8 mb-1">{{ auth()->user()->email }}</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Info-->
                    <!--begin::User menu-->
                    <div class="me-n2">
                        <!--begin::Action-->
                        <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-overflow="true">
                            <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black" />
                                    <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{ asset('media/logos/madara.svg') }}" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name }}
                                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>
                                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="../../demo8/dist/account/overview.html" class="menu-link px-5">My Profile</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <form method="POST" id="logout_form" action={{ route('logout') }}>
                                    @csrf
                                    <a href="javascript:{}" onclick="document.getElementById('logout_form').submit();" class="menu-link px-5 bg-light-danger">Logout</a>
                                </form>
                            </div>
                            <!--end::Menu item-->
                            
                        </div>
                        <!--end::Menu-->
                        <!--end::Action-->
                    </div>
                    <!--end::User menu-->
                </div>
                <!--end::Section-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::User-->
        <!--end::Aside user-->
    </div>
    <!--end::Aside Toolbarl-->
    <!--end::Footer-->
</div>