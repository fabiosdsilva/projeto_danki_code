<div id=map>
    <div class="center">
        <div class="w50-mapa left">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.789183392814!2d-38.28483868517919!3d-12.856888690931214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7163e51834c70d9%3A0x379c0c42d20ef86a!2sR.%20Vila%20Simara%20Ellery%20-%20Catu%20de%20Abrantes%2C%20Cama%C3%A7ari%20-%20BA!5e0!3m2!1spt-BR!2sbr!4v1629242985811!5m2!1spt-BR!2sbr"style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

     <!-- Fomulário -->       
    <form method='post'>
        <div class="w35-mapa right">
            <label>Nome completo</label>
            <div></div>
            <input require autocomplete="name" name="nome" autocorrect="on" autocapitalize="word" type="name" placeholder="Informe seu nome">
            <div></div>
            <label>Telefone</label>
            <div></div>
            <input require inputmode="numeric" autocomplete="on" name="telefone" type="telefone" value="" placeholder="Informe seu telefone">
            <div></div>
            <label>E-mail</label>
            <div></div>
            <input require autocomplete="email" type="email" name="email" placeholder="Informe seu e-mail">
            <div></div>
            <label>Mensagem</label>
            <div></div>
            <textarea require class="mensagem" rows="17" name="mensagem" placeholder="Sua mensagem"></textarea>
            <div></div>
            <input type="hidden" name="identificador" value="form_contato">
            <input type="submit" name="acao" value ="Enviar">
        </div>

    </form>

    </div> 
    <div class="clear"></div>  
</div>