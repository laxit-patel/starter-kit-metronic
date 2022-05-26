@extends('user.layouts.main',['title' => 'Dashboard'])

@section('breadcrumb')
<li class="breadcrumb-item pe-3"><a href="#" class="pe-3"><i class="fa fa-home text-primary"></i></a></li>
<li class="breadcrumb-item px-3 text-muted">Dashboard</li>
@endsection

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
	<div id="kt_content_container" class="container-fluid">
		<!--begin::Row-->
		<div class="row g-5 g-xl-8">
			<div class="col-xl-4">
				<!--begin::Statistics Widget 5-->
				<a href="#" class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
					<!--begin::Body-->
					<div class="card-body">
						<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
						<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
								<path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
								<path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
						<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Shopping Cart</div>
						<div class="fw-bold text-gray-400">Lands, Houses, Ranchos, Farms</div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>
			<div class="col-xl-4">
				<!--begin::Statistics Widget 5-->
				<a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
					<!--begin::Body-->
					<div class="card-body">
						<!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
						<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
								<path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
								<path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
								<path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
						<div class="text-white fw-bolder fs-2 mb-2 mt-5">Appartments</div>
						<div class="fw-bold text-white">Flats, Shared Rooms, Duplex</div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>
			<div class="col-xl-4">
				<!--begin::Statistics Widget 5-->
				<a href="#" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
					<!--begin::Body-->
					<div class="card-body">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
						<span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
								<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
								<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
								<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
						<div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">Sales Stats</div>
						<div class="fw-bold text-gray-100">50% Increased for FY20</div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>
		</div>
		<!--end::Row-->
	
	</div>
	<!--end::Container-->
</div>
<!--end::Post-->
@endsection