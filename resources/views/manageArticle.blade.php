@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">List Article</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Pembuat</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td style="width: 25%"><img src="{{ asset('storage/' . $article->image) }}"
                                style="max-width: 20%; max-height: 20%"></td>
                        <td>{{ $article->judul }}</td>
                        <td>{{ $article->category->judul_kategori }}</td>
                        <td>{{ $article->user->name }}</td>
                        <td>{{ $article->created_at->format('d M Y') }}</td>
                        <td>
                            <form action="{{ route('article.edit', $article->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">EDIT</button>
                            </form>
                            <form action="{{ route('article.delete', $article->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection