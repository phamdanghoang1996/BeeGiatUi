  <div id="click">
    <label for="" style="font-size: 16px;">Tên khách hàng: </label>
    <select class="" name="id_khachhang" class="form-control">
      @foreach($thongtin as $item)
          <option value="{{$item->id_khachhang}}">{{$item->tenkh}}</option>
      @endforeach
    </select>
  </div>
