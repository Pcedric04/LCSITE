<button onclick="showRecord('{{route('labo.back.contact.show',$contact->id)}}')" title="modifier"  class="btn btn-sm btn-outline-primary"><span class="fa fa-recycle"></span></button>
<button onclick="deleteRecordConfirm('{{route('labo.back.contact.delete',$contact->id)}}')" title="supprimer"  class="btn btn-sm btn-outline-danger"><span class="fa fa-trash"></span></button>
{{-- <button onclick="statusConfirm('{{route('labo.back.contact.status',$contact->id)}}')" title="En ligne/Hors ligne"  class="btn btn-sm btn-outline-success"><span class="fa fa-eye"></span></button> --}}
