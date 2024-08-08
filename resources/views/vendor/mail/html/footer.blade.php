<tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
            @php
                $date = date("Y");
            @endphp
            <tr>
                <td class="content-cell" align="center">
                    {{ Illuminate\Mail\Markdown::parse("Tous les droits sont réservés &copy;" . $date ) }}
                </td>
            </tr>
        </table>
    </td>
</tr>
