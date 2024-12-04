@foreach($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->created_at->format('M d, Y') }}</td>
        <td>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <h5>Comments:</h5>
            <ul>
                @foreach($post->comments as $comment)
                    <li>
                        <strong>{{ $comment->author ?? 'Anonymous' }}</strong>: {{ $comment->content }}
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="input-group mt-2">
                    <input type="text" name="author" class="form-control" placeholder="Your name (optional)">
                    <input type="text" name="content" class="form-control" placeholder="Add a comment..." required>
                    <button type="submit" class="btn btn-primary">Comment</button>
                </div>
            </form>
        </td>
    </tr>
@endforeach
