@extends('layouts.admin-skin')

@section('title')
    Login
@endsection

@section('contents')
    <!-- Event Search Area Start -->
    <div class="event-search-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div style="box-shadow: 0 1px 5px 2px rgba(0, 0, 0, 0.15);padding: 2rem;">
                        <form onsubmit="return loginAdmin()" class="search-form">
                            <div class="form-group">
                                <label for="admin-email">Email</label>
                                <input type="email" class="form-control" id="admin-email" placeholder="Email address">
                                <small class="form-input-icon"><i class="icon_pin_alt"></i></small>
                            </div>

                            <div class="form-group">
                                <label for="admin-password">Password</label>
                                <input type="password" class="form-control" id="admin-password" placeholder="Password">
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn razo-btn w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <!-- Event Search Area End -->
@endsection

@section('scripts')
    <script type="text/javascript">
        function loginAdmin() {
            var _token      = $("#token").val(); 
            var email       = $("#admin-email").val();
            var password    = $("#admin-password").val();

            fetch(`{{url('admin/login')}}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({_token, email, password})
            }).then(r => {
                return r.json();
            }).then(results => {
                // console.log(results)
                if(results.status == "success"){
                    window.location.href = "/admin/dashboard";
                }else{
                    swal(
                        "Ops!",
                        results.message,
                        results.status
                    );
                }
            }).catch(err => {
                console.log(JSON.stringify(err));
            })

            return false;
        }
    </script>
@endsection