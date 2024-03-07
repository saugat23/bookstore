@extends('layouts.default')

@section('content')
<section class="flex justify-center items-center text-center min-h-1/2 min-w-1/2 shadow-lg p-4 h-full w-full">
    <div class="my-auto">
        <div>
            <h1 class="text-blue-700 text-3xl">Edit Book: {{ $book->title }}</h1>
            <div class="flex flex-col justify-evenly items-center space-y-2 mt-8">
                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col justify-evenly items-start text-center space-y-4">
                        <div><label for="isbn">ISBN : </label><input type="text" id="isbn" name="isbn" placeholder="ISBN" class="rounded-full py-2 px-4 outline-none ml-2 bg-gray-100" value="{{ $book->isbn }}"></div>
                        <div><label for="title">Title : </label><input type="text" id="title" name="title" placeholder="Title" class="rounded-full py-2 px-4 outline-none ml-2 bg-gray-100" value="{{ $book->title }}"></div>
                        <div><label for="price">Price : </label><input type="text" id="price" name="price" placeholder="Price" class="rounded-full py-2 px-4 outline-none ml-2 bg-gray-100" value="{{ $book->price }}"></div>
                        <div><label for="quantity">Quantity : </label><input type="number" id="quantity" name="quantity" placeholder="Quantity" class="rounded-full py-2 px-4 outline-none ml-2 bg-gray-100" value="{{ $book->quantity }}"></div>
                        <div>
                            <label for="publisher_id">Publisher :</label>
                            <select id="publisher_id" name="publisher_id" class="rounded-full py-2 px-4 outline-none ml-2 bg-gray-100">
                                <option value="">Select Publisher</option>
                                @foreach($publishers as $publisher)
                                    <option value="{{ $publisher->id }}" {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="authors">Authors</label>
                            <select name="authors[]" id="authors" class="border-2 border-blue-700 rounded-md p-2 w-96" multiple required>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}" @if ($book->authors->contains($author->id)) selected @endif>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="genres">Genres</label>
                            <select name="genres[]" id="genres" class="border-2 border-blue-700 rounded-md p-2 w-96" multiple required>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" @if ($book->genres->contains($genre->id)) selected @endif>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center"><button type="submit" class="py-2 px-4 outline-none ml-2 rounded-full bg-blue-600 text-white">Update</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
