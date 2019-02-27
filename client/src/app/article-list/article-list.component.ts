import { Component, OnInit } from '@angular/core';
import { ArticleService } from '../shared/article/article.service';
import { DomSanitizer, SafeUrl  } from '@angular/platform-browser';
import { EmbedVideoService } from 'ngx-embed-video';


@Component({
  selector: 'app-article-list',
  templateUrl: './article-list.component.html',
  styleUrls: ['./article-list.component.css']
})
export class ArticleListComponent implements OnInit {
  articles: Array<any>;
  private : DomSanitizer;
  safeURL : SafeUrl;

  constructor(private articleService: ArticleService, public _sanitizer: DomSanitizer) { 
    this.safeURL = this._sanitizer.bypassSecurityTrustResourceUrl("https://www.youtube.com/embed/40JHNHkiHqw");
  }

  ngOnInit() {
    this.articleService.getAll().subscribe(data => {
      this.articles = data.data;

      this.articles.forEach(function(data)
      {
        if(data.videos.length !== 0){
          data.videos.forEach(function(data, _sanitizer){
            var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
            var match = data.videourl.match(regExp);
            data.imageurl = (match&&match[7].length==11)? match[7] : false;
            
          })
        }
        
      })
      
    });
  }

  
}
2