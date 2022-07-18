<div class="col-lg-12">
    <form action="{{ route('transfer.store') }} " method="POST">
        @csrf
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Tambah Transfer</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="{{!$errors->any() ? 'display: none' : ''}} ">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Dari Dompet</label>
                    <div class="col-lg-10">
                        <select name="from_wallet_id" id="" class="select2_demo_3 form-control">
                            <option value="">Pilih</option>
                            @foreach ($wallets as $wallet)
                                <option value="{{$wallet->id}}" {{ old('from_wallet_id') == $wallet->id ? 'selected' : ''}}>{{ $wallet->name }}</option>
                            @endforeach

                        </select>
                        @error('from_wallet_id')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('from_wallet_id') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Ke Dompet</label>
                    <div class="col-lg-10">
                        <select name="to_wallet_id" id="" class="select2_demo_3 form-control">
                            <option value="">Pilih</option>
                            @foreach ($wallets as $wallet)
                                <option value="{{$wallet->id}}" {{ old('to_wallet_id') == $wallet->id ? 'selected' : ''}}>{{ $wallet->name }}</option>
                            @endforeach

                        </select>
                        @error('to_wallet_id')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('to_wallet_id') }}</span>
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
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
