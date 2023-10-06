<x-layouts.test>

  <!--    <x-contact_us.listt />-->

  <div class="ms-auto me-auto w-50">
    <h3 class="pb-2">Registration:</h3>
    <form method="post">

        @csrf
<!--        <input type="text" name="__csrf" value="{{ \Csrf::get() }}">-->

      <div class="form-group">
        <label for="inputName" class="form-label">Name:</label>
        <input name="name" type="text" class="form-control" id="inputName" placeholder="Name" value="{{ old('name') }}">
        <div class="small text-danger position-absolute">
          {{$errors->first('name')}}
        </div>
      </div>

      <div class="form-group pt-4">
        <label for="inputEmail" class="form-label">Email:</label>
        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ old('email') }}">
        <div class="small text-danger position-absolute">
          {{$errors->first('email')}}
        </div>
      </div>

      <div class="form-group pt-4">
        <label for="inputAge" class="form-label">Age:</label>
        <input name="age" type="text" class="form-control" id="inputAge" placeholder="Age" value="{{ old('age') }}">
        <div class="small text-danger position-absolute">
          {{$errors->first('age')}}
        </div>
      </div>

      <div class="form-group pt-4">
        <label for="inputGender" class="form-label">Gender:</label>
        <select name="gender" class="form-select" id=""inputGender>
          <option disabled {{ !old('gender') ? 'selected' : '' }} class="d-none"></option>
          <option {{ old('gender') == 'male' ? 'selected' : '' }} value="male">Male</option>
          <option {{ old('gender') == 'female' ? 'selected' : '' }} value="female">Female</option>
        </select>
        <div class="small text-danger position-absolute">
          {{$errors->first('gender')}}
        </div>
      </div>

      <div class="form-group pt-4">
        <label for="inputPassword" class="form-label">Password:</label>
        <input name="password" type="password" class="form-control" id="inputPassword">
        <div class="small text-danger position-absolute">
          {{$errors->first('password')}}
        </div>
      </div>

        <div class="form-group pt-4">
            <label for="inputPasswordConfirm" class="form-label">Confirm password:</label>
            <input name="confirm_password" type="password" class="form-control" id="inputPasswordConfirm">
            <div class="small text-danger position-absolute">
                {{$errors->first('confirm_password')}}
            </div>
        </div>

      <div class="form-group pt-5">
        <button type="submit" class="btn btn-primary w-100" id="inputSubmit">Register</button>
      </div>

    </form>
  </div>

</x-layouts.test>