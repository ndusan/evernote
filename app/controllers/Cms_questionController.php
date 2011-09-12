<?php

class Cms_questionController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('questionCollection', $this->db->findQuestions());
    }
    
    public function addAction($params)
    {
       if(!empty($params['submit'])){
            
           if($this->db->createQuestion($params)){
               parent::redirect('cms'.DS.'questions', 'success');
           }else{
               parent::redirect('cms'.DS.'question'.DS.'add', 'error');
           }
       }
        
       parent::set('levelCollection', $this->db->getLevels());
    }
    
    public function editAction($params)
    {
        if(!empty($params['submit'])){
            
            if($this->db->updateQuestion($params)){
               parent::redirect('cms'.DS.'questions', 'success');
           }else{
               parent::redirect('cms'.DS.'question'.DS.'edit'.DS.$params['id'], 'error');
           }
        }

        parent::set('levelCollection', $this->db->getLevels());
        parent::set('question', $this->db->findQuestion($params['id']));
        parent::set('answerCollection', $this->db->findAnswers($params['id']));
    }
    
    
    
    public function statusAction($params)
    {
        parent::setRenderHTML(0);
        if($this->db->updateStatusQuestion($params)){
            parent::redirect ('cms'.DS.'questions', 'success');
        }else{
            parent::redirect ('cms'.DS.'questions', 'error');
        }
    }
    
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        if($this->db->deleteQuestion($params)){
            parent::redirect ('cms'.DS.'questions', 'success');
        }else{
            parent::redirect ('cms'.DS.'questions', 'error');
        }
    }
}