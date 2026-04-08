<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <style>
  .divider {
    display: flex;
    align-items: center;
    text-align: center;
    margin: 20px 0;
  }
  .divider::before,
  .divider::after {
    content: "";
    flex: 1;
    border-bottom: 1px solid #ccc;
  }
  .divider:not(:empty)::before {
    margin-right: .75em;
  }
  .divider:not(:empty)::after {
    margin-left: .75em;
  }
</style>

    <title>Login Admin Pengajuan WIFI</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    @include('admin.inc.head')
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo">
                <img src="https://media.licdn.com/dms/image/v2/C560BAQEORKYSEpYmvQ/company-logo_200_200/company-logo_200_200/0/1641759945715/direktorat_jenderal_pemasyarakatan_logo?e=1776902400&v=beta&t=uk5zJSYTOmXhP7SPG8SQ1r2wNuOuDs03hzgB0IO1vx8"
                    alt="Ditjenpas" style="height:35px; object-fit:contain;" class="me-3">
                  </span>
                  <span class="app-brand-text text-body fw-bolder">DITJENPAS 2026</span>
                </a>
              </div>
              <!-- /Logo -->
              <div class="text-center">
                <h4 class="mb-2">Welcome Admin 👋</h4>
                <p class="mb-4">Please sign-in to your account</p>
              </div>

              <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                {{-- <div class="mb-3">
                  <label for="email" class="form-label">Email or Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email-username"
                    placeholder="Enter your email or username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
                <div class="divider">OR</div> --}}

                <div class="mb-3">
                    <a class="btn btn-light d-flex align-items-center justify-content-center w-100 border" href="/auth/google">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg"
                     alt="Google" width="20" class="me-2">Continue with Google
                    </a>
                </div>
              </form>

              {{-- <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span>Create an account</span>
                </a>
              </p> --}}
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    {{-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> --}}

    <!-- Core JS -->
@include('admin.inc.js')
  </body>
</html>
