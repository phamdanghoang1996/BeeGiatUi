@foreach($quan as $item_quan)
  <option value="{{$item_quan->wardid}}">Phường {{$item_quan->phuong}}</option>
@endforeach
