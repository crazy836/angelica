@extends('layouts.app')

@section('content')
<script>
    window.location.href = '{{ route('cart.index') }}';
</script>
@endsection