<script type="text/javascript">
	function id(el){
	  return document.getElementById(el);
	}
	window.onload = function(){
	  id('vrres').onkeyup = function() {
	      var v = this.value;
	      v = v.replace(/[^\d,.]/, '');
	      this.value = v;
	  };
	  id('vrres').onblur = function() {
	    var v = this.value;
	    this.value = _format(v);
	  }
	};
</script>
