@foreach ($arsips as $item)
    <!-- Delete Modal HTML -->
    <div id="delete-arsip{{ $item->id }}" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data "{{$item->judul}}"?</p>
                    <p class="text-warning"><small>Tindakan ini tidak dapat diurungkan</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                    <form action="{{ route('arsip.delete',$item->id) }}" method="post" id="delete-arsip{{ $item->id }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Hapus">
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach