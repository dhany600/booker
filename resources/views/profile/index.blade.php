@extends('layouts.main')

@section('container')
    <div class="profile-page">
        <div class="background-color">
            <div class="container">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">
                                Profile
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="edit-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-pencil-line">
                                    <path d="M12 20h9" />
                                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z" />
                                    <path d="m15 5 3 3" /></svg>
                                Edit
                            </a>
                        </div>
                    </div>
                    <p class="input-title">
                        Nama Lengkap
                    </p>
                    <p class="input-data">
                        {{ auth()->user()->nama_lengkap }}
                    </p>
                    <p class="input-title">
                        Nomor Induk
                    </p>
                    <p class="input-data">
                        {{ auth()->user()->nomor_induk }}
                    </p>
                    <p class="input-title">
                        Kelas
                    </p>
                    <p class="input-data">
                        {{ auth()->user()->kelas }}
                    </p>
                    <p class="input-title">
                        Email
                    </p>
                    <p class="input-data">
                        {{ auth()->user()->email }}
                    </p>
                </div>
                <a href="/logout" class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>
        </div>
    </div>
@endsection
