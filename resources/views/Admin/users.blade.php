<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite('resources/css/adminUsers.css')
    @vite('resources/js/adminUsers.js')
</head>

<body>

    @include('include.adminHeader')

    <main class="admin-dashboard">

        <!-- ================= ADMIN INFO ================= -->
        <section class="card admin-info">
            <h2>Administrator</h2>

            <div class="admin-details">
                <div>
                    <strong>Name</strong>
                    <span>{{ auth()->user()->name }}</span>
                </div>
                <div>
                    <strong>Email</strong>
                    <span>{{ auth()->user()->email }}</span>
                </div>
                <div>
                    <strong>Role</strong>
                    <span>Administrator</span>
                </div>
            </div>
        </section>

        <!-- ================= RESPONSABLES ================= -->
        <section class="card">
            <div class="section-header">
                <h2>Responsables ({{$nbrResponsables}})</h2>
                <button class="btn" id="open-create-form">+ Create Responsable</button>
            </div>

            <div class="cards-grid">
                @foreach($users as $user)
                @if($user->type === 'responsable')
                <div class="user-card">
                    <div class="user-info">
                        <h4>{{ $user->name }}</h4>
                        <p>{{ $user->email }}</p>
                    </div>

                    <div class="actions">
                        <button class="btn outline modify-responsable-btn"
                            data-id="{{ $user->id }}"
                            data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}"
                            data-type="{{$user->type}}"
                            data-category="{{ $user->category }}"
                            data-action="{{ route('admin.modify.responsable', $user->id) }}">Modify</button>
                        <a href="{{ route('admin.delete.user', $user->id) }}">
                            <button class="btn danger delete-btn">Delete</button>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </section>

        <!-- ================= USERS ================= -->
        <section class="card">
            <h2>Users ({{$nbrUsers}})</h2>

            <div class="cards-grid">
                @foreach($users as $user)
                @if($user->type === 'utilisateur')
                <div class="user-card">
                    <div class="user-info">
                        <h4>{{ $user->name }}</h4>
                        <p>{{ $user->email }}</p>
                    </div>

                    <div class="actions">
                        <button class="btn outline modify-responsable-btn"
                            data-id="{{ $user->id }}"
                            data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}"
                            data-type="{{$user->type}}"
                            data-category="{{ $user->category }}"
                            data-action="{{ route('admin.modify.responsable', $user->id) }}">Modify</button>
                        <a href="{{ route('admin.block.user', $user->id) }}">
                            @if($user->blocked == false)
                            <button class="btn danger block-btn">Block</button>
                            @elseif($user->blocked == true)
                            <button class="btn danger block-btn">Unblock</button>
                            @endif
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </section>

        <!-- ================= CREATE RESPONSABLE FORM ================= -->
        <section class="card form-card hidden" id="create-responsable-form">
            <h2>Create Responsable</h2>

            <form action="{{ route('create.responsable') }}" method="post" class="create-form">
                @csrf

                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <select name="category" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <div class="form-actions">
                    <button type="submit" class="btn">Confirm</button>
                    <button type="button" class="btn outline" id="cancel-create">Cancel</button>
                </div>
            </form>
        </section>

        <!-- ================= MODIFY RESPONSABLE FORM ================= -->
        <section class="card form-card hidden" id="modify-responsable-div">
            <h2>Modifier Responsable name</h2>
            <h3>Email Responsable email</h3>

            <form method="post" class="create-form" id="modify-responsable-form">
                @csrf
                <input type="hidden" name="id" id="user-id">

                <label for="type">Role</label>
                <select name="type" id="type">
                    <option value="responsable">Responsable</option>
                    <option value="utilisateur">Utilisateur</option>
                </select>

                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="aucun">Aucun</option>
                    @foreach($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <div class="form-actions">
                    <button type="submit" class="btn">Confirm</button>
                    <button type="button" class="btn outline" id="cancel-modify-responsable">Cancel</button>
                </div>
            </form>
        </section>

    </main>

</body>

</html>