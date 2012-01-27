<?php
class ConcatPDF extends FPDI {
  protected $files = array();
  protected $files_orientation = array();

  public function setFiles($files, $files_orientation = array()) {
    $this->files = $files;
    $this->files_orientation = $files_orientation;
  }

  public function concat() {
    $this->setDisplayMode('real');
    $this->setPrintHeader(false);
    $this->setPrintFooter(false);
    foreach($this->files as $num => $file) {
      $pagecount = $this->setSourceFile($file);
      for ($i = 1; $i <= $pagecount; $i++) {
        $tplidx = $this->ImportPage($i);
        $s = $this->getTemplatesize($tplidx);
        $orientation = @$this->files_orientation[$num] ? $this->files_orientation[$num] : 'P';
        $this->AddPage($orientation, array($s['w'], $s['h']));
        $this->useTemplate($tplidx);
      }
    }
  }
}