<div class="col-lg-12">
    <form action="{{ route('payable.payment') }} " method="POST">
        @csrf
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Bayar Hutang</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="{{!$errors->any() ? 'display: none' : ''}} ">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Hutang</label>
                    <div class="col-lg-10">
                        <select name="payable_id" id="" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($payableExists as $pay)
                                <option value="{{$pay->id}}" {{ old('payable_id') == $pay->id ? 'selected' : ''}}>{{ $pay->title }}</option>
                            @endforeach

                        </select>
                        @error('payable_id')
                            <span class="form-text m-b-none text-danger">{{ $errors->first('payable_id') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Dompet</label>
                    <div class="col-lg-10">
                        <select name="wallet_id" id="" class="form-control">
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
                        <input type="number" min="0" placeholder="Jumlah" name="payment_amount" class="form-control" value="{{ old('payment_amount') }}">
                        @error('payment_amount')
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
