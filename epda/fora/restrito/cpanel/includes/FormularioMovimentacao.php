    <table class="table table-bordered">
    	<b style="color:#0B5E92; background-color:#F3F1F1">Dados do Funcion&aacute;rio : </b>
    	<tbody>
    		<tr>

    			<td style="background-color:#587CAD; color: #F3F1F1; ">Nome:</td>
    			<td align="left" colspan="2" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $nome ?></td>
    			<td align="left" style="background-color:#587CAD; color: #F3F1F1; ">Função:</td>
    			<td align="left" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $funcao ?></td>
    			<td align="left" style="background-color:#587CAD; color: #F3F1F1; ">Horas já Realizadas:</td>
    			<td align="left" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $qts . '/' . horas; ; ?></td>
                <td align="left" style="background-color:#587CAD; color: #F3F1F1; ">Valor estimado:</td>
    			<td align="left" style="background-color:#F3F1F1; color:#4F090A; "><?php echo "R$"." ".$qtsT; ?></td>

    		</tr>
    		<tr>

    			<td style="background-color:#587CAD; color: #F3F1F1; ">Departamento :</td>
    			<td colspan="4" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $dep ?></td>
    			<td style="background-color:#587CAD; color: #F3F1F1; ">Secretária resp:</td>
    			<td colspan="3" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $secretaria ?></td>

    		</tr>
    		<tr>


    		</tr>
    	</tbody>
    </table>

    <br><?php echo $dadosProtocolo ?>
    <table class="table table-bordered">
    	<b style="color:#0B5E92; background-color:#F3F1F1"> Dados da Solicitação :</b>
    	<tbody>
    		<tr>

    			<td style="background-color:#587CAD; color: #F3F1F1; ">Nº de Protocolo:</td>
    			<td align="left" colspan="2" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $data[tb_numprotocolo]; ?></td>
    			<td align="left" style="background-color:#587CAD; color: #F3F1F1; ">Data da solicitacao:</td>
    			<td align="left" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $dtsol ?></td>
    			<td align="left" style="background-color:#587CAD; color: #F3F1F1; ">Quant de horas solicitada:</td>
    			<td align="left" style="background-color:#F3F1F1; color:#4F090A; "><?php echo $row['tb_hr_solicitada'] . '/' . horas; ?></td>


    			<td align="left" style="background-color:#587CAD; color: #F3F1F1; ">Estimativa HR:</td>
    			<td style="background-color:#F3F1F1; color:#4F090A; " align="center" title="Abrir Anexo"><?php echo 'R$' . ' ' . $HRx ?></td>
    		</tr>
    		<tr>
    			<td colspan="11" style="background-color:#F3F1F1; color:#4F090A; "><b>Observação: </b><?php echo $row[tb_motivo]; ?> </td>

    		</tr>
    		<tr>
    		</tr>
    	</tbody>
    </table>