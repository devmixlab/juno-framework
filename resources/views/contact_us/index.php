<x-layouts.test>

<!--    <x-contact_us.listt />-->

    <div class="ms-auto me-auto w-50">
        <h3 class="pb-2">Contact Us:</h3>
        <form method="post">
            <div class="form-group">
                <label for="inputName" class="form-label">Name:</label>
                <input name="name" type="text" class="form-control" id="inputName" placeholder="Name" value="{{ old('name') }}">
                <div class="small text-danger position-absolute">
                    {{$errors->first('name')}}
                </div>
            </div>
            <div class="form-group pt-4">
                <label for="inputEmail" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ old('email') }}">
                <div class="small text-danger position-absolute">
                    {{$errors->first('email')}}
                </div>
            </div>
            <div class="form-group pt-4">
                <label for="inputMessage" class="form-label">Message</label>
                <textarea name="message" rows="6" class="form-control" id="inputMessage" placeholder="Email">{{ old('message') }}</textarea>
                <div class="small text-danger position-absolute">
                    {{$errors->first('message')}}
                </div>
            </div>
            <div class="form-group pt-5">
                <button type="submit" class="btn btn-primary w-100" id="inputSubmit">Submit</button>
            </div>
        </form>
    </div>

</x-layouts.test>