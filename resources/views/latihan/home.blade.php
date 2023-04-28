@extends('layouts.weblayout')

@section('title', 'home')

@section('content')
    @php
        $name = 'Sidin';
    @endphp
    <div class="container">
        <h1>Bootstrap {{ $name }}</h1>
        <div class="row">
            {{-- <div class="col-md-4">
                <img src="D:\Kuliah\Mata Kuliah\Semester 4\Web Programming\Laravel\MyPersonalWeb\resources\image\pesawat_sidin.png" alt="">
            </div> --}}
            <div class="col-md-4">
                <div class="row">
                    <div class="col">
                        col 1
                    </div>
                    <div class="col">
                        col 2
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form</h5>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Example text area</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-warning">Reset</button>
                            <button class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h1>Table</h1>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
