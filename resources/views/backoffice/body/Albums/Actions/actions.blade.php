<a href="{{route('labo.back.albums.show',$albums->id)}}" title="modifier"  class="btn btn-sm btn-outline-primary"><span class="fa fa-recycle"></span></a>
<button onclick="deleteRecordConfirm('{{route('labo.back.albums.delete',$albums->id)}}')" title="supprimer"  class="btn btn-sm btn-outline-danger"><span class="fa fa-trash"></span></button>
<button onclick="statusConfirm('{{route('labo.back.albums.status',$albums->id)}}')" title="En ligne/Hors ligne"  class="btn btn-sm btn-outline-success"><span class="fa fa-eye"></span></button>
