@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="card border border-danger">
            <div class="card-header bg-transparent border-danger">
                <h5 class="my-0 text-danger"><i class="mdi mdi-block-helper me-3"></i>
                    {{ $error }}
                </h5>
            </div>
        </div>
        <br>
        <br>
    @endforeach
@endif
@if (session()->get('succes'))
    <div class="card border border-success">
        <div class="card-header bg-transparent border-success">
            <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i>
                {{ session()->get('succes') }}
            </h5>
        </div>
    </div>
    <br>
    <br>
@endif
