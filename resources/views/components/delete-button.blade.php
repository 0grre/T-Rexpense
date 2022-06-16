

<form action="{{ $route }}" method="POST">
    @method('delete')
    @csrf
    <button type="submit">delete</button>
</form>
