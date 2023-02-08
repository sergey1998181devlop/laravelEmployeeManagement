<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if($item->exists)
                    <button type="submit" class="btn btn-primary" disabled>Update employer</button>
                @else
                    <button type="submit" class="btn btn-primary">Save employer</button>
                @endif
            </div>
        </div>
    </div>
</div>
@if($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: {{ $item->id }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Created</label>
                        <input type="text" value="{{ $item->created_at }}" class="form-control" disabled>
                    </div>
                    <br>
                    <div class="form-control">
                        <label for="title">Changed</label>
                        <input type="text" value="{{ $item->updated_at }}" class="form-control" disabled>
                    </div>
                    <br>
                    @if($item->exists)
                        <br>
                        <form method="POST" action="{{ route('panel.admin.employers.destroy' , $item->id) }}">
                            @method('DELETE')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button type="submit" class="btn btn-link">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
