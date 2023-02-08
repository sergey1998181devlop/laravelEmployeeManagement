@php /** @var \App\Models\BlogCategory $item */ @endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->email_verified_at)
                    Activated
                @else
                    Draft
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle md-2 text-muted"></div>


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="tablist">
                        <button class="nav-link active" id="maindata-tab" data-bs-toggle="tab" data-bs-target="#maindata" type="button" role="tab" aria-controls="maindata" aria-selected="true">Basic data</button>
                    </li>
                    <li class="nav-item" role="tablist">
                        <button class="nav-link" id="adddata-tab" data-bs-toggle="tab" data-bs-target="#adddata" type="button" role="tab" aria-controls="adddata" aria-selected="false">Additional data</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="maindata" role="tabpanel" aria-labelledby="maindata-tab">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" value="{{ $item->name }}"
                                   id="name"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input name="surname" value="{{ $item->surname }}"
                                   id="surname"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="adddata" role="tabpanel" aria-labelledby="adddata-tab">
                        <div class="form-group">
                            <label for="position_id">Positions</label>
                            <select name="position_id"
                                    id="position_id"
                                    class="form-control"
                                    placeholder="Select a position"
                                    required>
                                @foreach($positionList as $positionOption)
                                    <option value="{{ $positionOption->id }}"
                                            @if($positionOption->id == $item->position_id) selected @endif>
                                        {{ $positionOption->id_name  }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="permission_id">Permissions</label>
                            <select name="permission_id"
                                    id="permission_id"
                                    class="form-control"
                                    placeholder="Select a permissions"
                                    required>
                                @foreach($permissionList as $permissionOption)
                                    <option value="{{ $permissionOption->id }}"
                                            @if($permissionOption->id == $item->permission_id) selected @endif>
                                        {{ $permissionOption->id_name  }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

