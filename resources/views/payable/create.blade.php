<div class="col-lg-12">
    <form action="{{ route('payable.store') }} " method="POST">
        @csrf
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Tambah Hutang</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="{{!$errors->any() ? 'display: none' : ''}} ">

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Judul</label>
                    <div class="col-lg-10">
                        <input type="text" placeholder="Judul" name="title" class="form-control" value="{{ old('title') }}">
                        @error('title')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('title') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Jumlah</label>
                    <div class="col-lg-10">
                        <input type="number" min="0" placeholder="Jumlah" name="amount" class="form-control" value="{{ old('amount') }}">
                        @error('amount')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('amount') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Deskripsi</label>
                    <div class="col-lg-10">
                        <textarea type="text" placeholder="Deskripsi" name="description" class="form-control" value="">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('description') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
