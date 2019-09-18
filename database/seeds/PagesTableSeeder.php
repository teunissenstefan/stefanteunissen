<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageAbout = new \App\Page();
        $pageAbout->title = "Teunissen";
        $pageAbout->content = "<a class=\"d-none d-md-block\" href=\"javascript:void(0);\">
                    <img src=\"https://stefanteunissen.nl/images/profile.png\" class=\"img-fluid img-profile st-border--orange\">
                </a><br/><p class=\"lead\">Stefan Teunissen is 21 jaar oud en woont in Beuningen, Gelderland. Sinds 2017 volgt hij de opleiding Applicatieontwikkelaar (MBO Niveau 4) aan het Rijn IJssel te Arnhem locatie Zijpendaalseweg. Zijn passie is programmeren. Hierbij focust hij zich vooral op webapplicaties maar maakt hij ook Android en Windows apps.</p>
                    <p class=\"followed\">(+31) 6 - 22 171 004</p>
                    <p class=\"followed\"><a href=\"mailto:stefan@teunissen.xyz\" class=\"st-fg--orange\">stefan@teunissen.xyz</a></p>
                    <div class=\"social-icons\">
                        <a href=\"https://www.linkedin.com/in/teunissenstefan/\" target=\"_blank\">
                            <i class=\"fab fa-linkedin-in\"></i>
                        </a>
                        <a href=\"https://github.com/teunissenstefan\" target=\"_blank\">
                            <i class=\"fab fa-github\"></i>
                        </a>
                    </div>";
        $pageAbout->save();

        $pageExperience = new \App\Page();
        $pageExperience->title = "Ervaring";
        $pageExperience->content = "<div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">Stagiair Applicatieontwikkelaar</h3>
                            <p>Apprentice XM<br/>Arnhem</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">Januari 2019 - Mei 2019</span>
                        </div>
                    </div>
                    <div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">Reclame bezorger</h3>
                            <p>Axender BV<br/>Beuningen</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">Januari 2016 - Augustus 2017</span>
                        </div>
                    </div>
                    <div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">Stagiair IT</h3>
                            <p>ROC Nijmegen<br/>Njimegen</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">Februari 2016 - Juli 2016</span>
                        </div>
                    </div>";
        $pageExperience->save();

        $pageEducation = new \App\Page();
        $pageEducation->title = "Onderwijs";
        $pageEducation->content = "<div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">ROC Rijn IJssel</h3>
                            <p>Applicatieontwikkelaar<br/>MBO Niveau 4</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">2017 - heden</span>
                        </div>
                    </div>
                    <div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">ROC Nijmegen</h3>
                            <p>Medewerker Beheer ICT<br/>MBO Niveau 3</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">2014 - 2016</span>
                        </div>
                    </div>
                    <div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">Canisius College</h3>
                            <p>Grafi-Media<br/>VMBO-K</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">2012 - 2014</span>
                        </div>
                    </div>";
        $pageEducation->save();

        $pageSkills = new \App\Page();
        $pageSkills->title = "Vaardigheden";
        $pageSkills->content = "<div class=\"my-auto\">
          <div id=\"wordcloud\" style=\"height:500px;\">
          <p class='fg'>#ff6724</p>
          <p class='bg'>transparent</p>
          <p class='wordcloud2List'><span class='key'>Python</span><span class='value'>4</span></p>
          <p class='wordcloud2List'><span class='key'>Laravel</span><span class='value'>10</span></p>
          <p class='wordcloud2List'><span class='key'>Materialize</span><span class='value'>6</span></p>
          <p class='wordcloud2List'><span class='key'>Bootstrap</span><span class='value'>9</span></p>
          <p class='wordcloud2List'><span class='key'>Semantic UI</span><span class='value'>6</span></p>
          <p class='wordcloud2List'><span class='key'>jQuery</span><span class='value'>5</span></p>
          <p class='wordcloud2List'><span class='key'>Vagrant</span><span class='value'>5</span></p>
          <p class='wordcloud2List'><span class='key'>PHP</span><span class='value'>12</span></p>
          <p class='wordcloud2List'><span class='key'>C#</span><span class='value'>10</span></p>
          <p class='wordcloud2List'><span class='key'>CSS</span><span class='value'>8</span></p>
          <p class='wordcloud2List'><span class='key'>JavaScript</span><span class='value'>8</span></p>
          <p class='wordcloud2List'><span class='key'>C++</span><span class='value'>6</span></p>
          <p class='wordcloud2List'><span class='key'>MySQL</span><span class='value'>5</span></p>
          <p class='wordcloud2List'><span class='key'>Java</span><span class='value'>4</span></p>
          <p class='wordcloud2List'><span class='key'>Windows</span><span class='value'>9</span></p>
          <p class='wordcloud2List'><span class='key'>Linux</span><span class='value'>7</span></p>
          <p class='wordcloud2List'><span class='key'>MS Office</span><span class='value'>6</span></p>
          <p class='wordcloud2List'><span class='key'>HTML</span><span class='value'>11</span></p>
          <p class='wordcloud2List'><span class='key'>Adobe CC</span><span class='value'>6</span></p>
          <p class='wordcloud2List'><span class='key'>SASS</span><span class='value'>5</span></p>
          </div>
        </div>";
        $pageSkills->save();

        $pageInterests = new \App\Page();
        $pageInterests->title = "Interesses";
        $pageInterests->content = "<p class=\"lead\">Stefans hobby's zijn gamen, gitaar spelen, wandelen, muziek luisteren en natuurlijk programmeren.
                Als het op programmeren aan komt is Stefan vooral bezig met PHP en het Laravel framework.</p>";
        $pageInterests->save();

        $pageCertificates = new \App\Page();
        $pageCertificates->title = "Certificaten";
        $pageCertificates->content = "<div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">MTA: Introduction to programming using JavaScript</h3>
                            <p>Microsoft</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">Juli 2018</span>
                        </div>
                    </div>
                    <div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">MTA: Introduction to programming using HTML and CSS</h3>
                            <p>Microsoft</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">Juli 2018</span>
                        </div>
                    </div>
                    <div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">ECDL Standaard</h3>
                            <p>ECDL Foundation</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">Februari 2016</span>
                        </div>
                    </div>
                    <div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">ECDL Basis</h3>
                            <p>ECDL Foundation</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">December 2015</span>
                        </div>
                    </div>
                    <div class=\"resume-item d-flex flex-column flex-md-row mb-5\">
                        <div class=\"resume-content mr-auto text-left\">
                            <h3 class=\"mb-0\">IT Essentials</h3>
                            <p>Cisco</p>
                        </div>
                        <div class=\"resume-date text-md-right\">
                            <span class=\"text-primary\">Juli 2015 - Juli 2018</span>
                        </div>
                    </div>";
        $pageCertificates->save();

        $pageDisabled = new \App\Page();
        $pageDisabled->title = "Readonly & Disabled";
        $pageDisabled->content = "<input type=\"text\" value=\"readonly\" readonly=\"\"><input type=\"text\" value=\"disabled\" disabled=\"\"><br><p align=\"center\">readonly = je mag het lezen maar niet bewerken</p><p align=\"center\">disabled = je mag er niks mee</p><p align=\"center\">Om deze reden moet je dus ook niks kunnen selecteren uit een disabled text input.<br></p>";
        $pageDisabled->save();

        $pageContact = new \App\Page();
        $pageContact->title = "Contact";
        $pageContact->content = "<p class=\"followed\">(+31) 6 - 22 171 004</p>
                    <p class=\"followed\"><a href=\"mailto:stefan@teunissen.xyz\" class=\"st-fg--orange\">stefan@teunissen.xyz</a></p>
                    <div class=\"social-icons\">
                        <a href=\"https://www.linkedin.com/in/teunissenstefan/\" target=\"_blank\">
                            <i class=\"fab fa-linkedin-in\"></i>
                        </a>
                        <a href=\"https://github.com/teunissenstefan\" target=\"_blank\">
                            <i class=\"fab fa-github\"></i>
                        </a>
                    </div>";
        $pageContact->save();
    }
}
