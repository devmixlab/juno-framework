<x-layouts.test>

  <!--    <x-contact_us.listt />-->

  <div class="ms-auto me-auto w-50">
    <h3 class="pb-2">Authorization:</h3>

    <?php if(flash_session()->has('message')): ?>
    <div class="alert alert-danger" role="alert">
      {{ flash_session()->get('message') }}
    </div>
    <?php endif; ?>

    <form method="post">

        @csrf

      <div class="form-group pt-4">
        <label for="inputEmail" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ old('email') }}">
        <div class="small text-danger position-absolute">
          {{$errors->first('email')}}
        </div>
      </div>

      <div class="form-group pt-4">
        <label for="inputPassword" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="inputPassword">
        <div class="small text-danger position-absolute">
          {{$errors->first('password')}}
        </div>
      </div>

      <div class="form-group pt-5">
        <button type="submit" class="btn btn-primary w-100" id="inputSubmit">Enter</button>
      </div>

    </form>
  </div>

</x-layouts.test>