<x-layout>
  <div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Register now!</h1>
        <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
          quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
      </div>
      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" action="/post-register" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-control">
            <label class="label">
              <span class="label-text">Name</span>
            </label>
            <input type="text" name="name" class="input input-bordered" value="{{old('name')}}" />

            @error('name')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="email" name="email" class="input input-bordered" value="{{old('email')}}" />

            @error('email')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" name="password" class="input input-bordered" value="{{old('password')}}" />

            @error('password')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Confirm Password</span>
            </label>
            <input type="password" name="password_confirmation" class=" input input-bordered"
              value="{{old('password_confirmation')}}" />

            @error('password_confirmation')
            <p class="text-red-600">{{$message}}</p>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span><label class="label-text">Profile</span>
            </label>
            <input type="file" name="image" id="image" value="{{old('image')}}">
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>