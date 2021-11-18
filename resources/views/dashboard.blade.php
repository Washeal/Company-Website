<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Hi....{{Auth::user()->name}}
          <b style="float:right;">Total User
           <span class="badge badge-danger">{{count($user)}}</span>
        </b>
        </h2>
    </x-slot>

      <div class="container">
          <div class="row"> 
          <table class="table">
  <thead>
    <tr>
      <th scope="col">SL NO</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Create At</th>
    </tr>
  </thead>
  <tbody>
      @php($in=1)
      @foreach($user as $users)
    <tr>
      <th scope="row">{{$in++}}</th>
      <td>{{$users->name}}</td>
      <td>{{$users->email}}</td>
      <td>{{carbon\carbon::parse($users->created_at)->diffforhumans()}}</td>
    </tr>
     @endforeach
  </tbody>
</table>

          </div>
      </div>  





</x-app-layout>
