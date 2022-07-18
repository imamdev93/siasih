<div class="col-lg-12">
    <form action="{{ route('transaction.store') }} " method="POST">
        @csrf
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Tambah Transaksi</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="{{!$errors->any() ? 'display: none' : ''}} ">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Dompet</label>
                    <div class="col-lg-10">
                        <select name="wallet_id" id="" class="select2_demo_3 form-control">
                            <option value="">Pilih</option>
                            @foreach ($wallets as $wallet)
                                <option value="{{$wallet->id}}" {{ old('wallet_id') == $wallet->id ? 'selected' : ''}}>{{ $wallet->name }}</option>
                            @endforeach

                        </select>
                        @error('wallet_id')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('wallet_id') }}</span>
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
                    <label class="col-lg-2 col-form-label">Catatan</label>
                    <div class="col-lg-10">
                        <textarea type="text" placeholder="Catatan" name="note" class="form-control" value="">{{ old('note') }}</textarea>
                        @error('note')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('note') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Tipe Transaksi</label>
                    <div class="col-lg-10">
                        <select name="type" id="" class="form-control">
                            <option value="">Pilih</option>
                            <option value="pemasukan" {{ old('type') == 'pemasukan' ? 'selected' : ''}}>Pemasukan</option>
                            <option value="pengeluaran" {{ old('type') == 'pengeluaran' ? 'selected' : ''}}>Pengeluaran</option>
                        </select>
                        @error('type')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('type') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Kategori Transaksi</label>
                    <div class="col-lg-10">
                        <select name="category_id" id="" class="select2_demo_3 form-control">
                            <option value="">Pilih</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach

                        </select>
                        @error('category_id')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('category_id') }}</span>
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
