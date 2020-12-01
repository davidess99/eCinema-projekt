<div class="container movie-carousel">
  <div class="owl-carousel">
    <?php 
       foreach($readAll as $row): 
            echo "<div class='item'>";
                    echo "<img src='/upload/".$row['plagat']."' alt='' />";
                    echo "<div class='movie-poster' style='background-image: url(/upload/".$row['plagat'].");'></div>";

                        echo "<div class='movie-details'>";
                            echo "<h1>".$row['nazov']."</h1>";
                            echo "<span class='resolution-tag'>".$row['rozlisenie']."</span>";
                            echo "<span class='dubbing-tag'>".$row['oznacenie_dabingu']."</span>";
                            echo "<span class='subtitles-tag'>".$row['oznacenie_titulky']."</span>";
                            echo "<span class='recommended-age-tag'>".$row['vhodne_od']."</span><br><br>";
                            echo "<p><b>Premiéra: </b>".date("d. m. Y", strtotime($row['premiera']))."</p>";
                            echo "<p><b>Dĺžka: </b>".$row['dlzka_filmu_min']." minút</p>";

                            $reziseri = [];
                            $reziseri = Database::readSQL("SELECT * FROM filmy_reziseri fr INNER JOIN reziseri r ON (fr.reziseri_id_rezisera = r.id_rezisera) WHERE fr.filmy_id_filmu = ".$row['id_filmu']."");
                            $reziseriZoznam = "";
                            $index = 0;
                            foreach($reziseri as $rez):
                                if (count($reziseri) > 1) {
                                    if($index != 0) {
                                        $reziseriZoznam = $reziseriZoznam.", ".$rez['meno']." ".$rez['priezvisko'];
                                    } else if ($index == 0) {
                                        $reziseriZoznam = $rez['meno']." ".$rez['priezvisko'];
                                    }
                                    $index++;
                                } else {
                                    $reziseriZoznam = $rez['meno']." ".$rez['priezvisko'];
                                }
                            endforeach;
                            echo "<p><b>Réžia: </b>".$reziseriZoznam."</p>";



                            $herci = [];
                            $herci = Database::readSQL("SELECT * FROM filmy_herci fh INNER JOIN herci h ON (fh.herci_id_herca = h.id_herca) WHERE fh.filmy_id_filmu = ".$row['id_filmu']."");
                            $herciZoznam = "";
                            $index = 0;
                            foreach($herci as $her):
                                if (count($herci) > 1) {
                                    if($index != 0) {
                                        $herciZoznam = $herciZoznam.", ".$her['meno']." ".$her['priezvisko'];
                                    } else if ($index == 0) {
                                        $herciZoznam = $her['meno']." ".$her['priezvisko'];
                                    }
                                    $index++;
                                } else {
                                    $herciZoznam = $her['meno']." ".$her['priezvisko'];
                                }
                            endforeach;
                            echo "<p><b>Hrajú: </b>".$herciZoznam."</p>";


                            $zanre = [];
                            $zanre = Database::readSQL("SELECT * FROM filmy_zanre fz INNER JOIN zanre z ON (fz.zanre_filmu_id_zanru = z.id_zanru) WHERE fz.filmy_id_filmu = ".$row['id_filmu']."");
                            $zanreZoznam = "";
                            $index = 0;
                            foreach($zanre as $zan):
                                if (count($zanre) > 1) {
                                    if($index != 0) {
                                        $zanreZoznam = $zanreZoznam.", ".$zan['zaner'];
                                    } else if ($index == 0) {
                                        $zanreZoznam = $zan['zaner'];
                                    }
                                    $index++;
                                } else {
                                    $zanreZoznam = $zan['zaner'];
                                }
                            endforeach;
                            echo "<p><b>Žáner: </b>".$zanreZoznam."</p>";

                            
                        echo "</div>";

                    echo "<a href='".$row['link_trailer']."' class='trailer-link'>Pozrieť trailer</a>";
            echo "</div>";
    endforeach; ?>
</div>
</div>