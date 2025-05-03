<button onclick="showRecord('{{route('labo.back.agendas.show',$agendas->id)}}')" title="modifier"  class="btn btn-sm btn-outline-primary"><span class="fa fa-recycle"></span></button>
<button onclick="deleteRecordConfirm('{{route('labo.back.agendas.delete',$agendas->id)}}')" title="supprimer"  class="btn btn-sm btn-outline-danger"><span class="fa fa-trash"></span></button>
<button onclick="statusConfirm('{{route('labo.back.agendas.status',$agendas->id)}}')" title="En ligne/Hors ligne"  class="btn btn-sm btn-outline-success"><span class="fa fa-eye"></span></button>
