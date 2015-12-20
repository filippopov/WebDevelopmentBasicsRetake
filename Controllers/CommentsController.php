<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 12/17/2015
 * Time: 8:57 PM
 */

namespace MVC\Controllers;


use MVC\BindingModels\Comments\CommentsBindingModel;
use MVC\Models\CommentsRepository;
use MVC\View;
use MVC\ViewModels\CommentInformation;
use MVC\ViewModels\CommentViewModel;

class CommentsController extends Controller {

//    /**
//     * @return View
//     * @throws \Exception
//     * @Authorization()
//     */
//    public function allComments(){
//
//        $comments = CommentsRepository::create()->orderByDescending(CommentsBindingModel::ID)->findAll();
//        $commentsViewModel = [];
//        foreach($comments as $comment){
//            $commentsViewModel[] = new CommentViewModel(
//                $comment->getId(),
//                $comment->getComment(),
//                $comment->getDateTime(),
//                $comment->getAuthorName(),
//                $comment->getUserId()
//            );
//        }
//
////        $this->escapeAll($commentsViewModel);
//
//        return new View($commentsViewModel);
//
//    }

    /**
     * @return View
     * @throws \Exception
     * @Authorization()
     */
    public function allComments($pageIndex){
        $page = $pageIndex * 5;
        $comments = CommentsRepository::create()->findAllWithPaging($page);
        $commentsViewModel = [];
        foreach($comments as $comment){
            $commentsViewModel[] = new CommentViewModel(
                $comment->getId(),
                $comment->getComment(),
                $comment->getDateTime(),
                $comment->getAuthorName(),
                $comment->getUserId()
            );
        }

//        $this->escapeAll($commentsViewModel);

        $count = CommentsRepository::create()->counter();
        $number = ceil($count['count']/5);
        $allModels=[];
        $allModels[] = $commentsViewModel;
        $allModels[] = $number;

        return new View($allModels);

    }

    /**
     * @return View
     * @Authorization()
     */
    public function addComment(){
        $errorModel = new CommentInformation();
        if (isset($_POST['add-comment'])) {
            if ($_POST['comment']==''){
                $errorModel->error = true;
                return new View($errorModel);
            }

            $comment = $_POST['comment'];
            $dateTime = new \DateTime(null, new \DateTimeZone('Europe/Sofia'));
            $stringTime = $dateTime->format('Y-m-d H:i:s');
            $authorId = $_SESSION['id'];

            $commentBindingModel = new CommentsBindingModel($comment,$authorId,$stringTime);
            CommentsRepository::add($commentBindingModel);
            CommentsRepository::save();
            $errorModel->success=true;
            return new View($errorModel);
        }

        return new View();

    }

    public function deleteComment($id){
        CommentsRepository::create()->deleteFilterById($id)->delete();
    }

    /**
     * @param $id
     * @return View
     * @Authorization()
     */
    public function editComment($id){
        $errorModel = new CommentInformation();
        $comment = CommentsRepository::create()->filterById($id)->findOne();
        $commentViewModel = new CommentViewModel(
            $comment->getId(),
            $comment->getComment(),
            $comment->getDateTime(),
            $comment->getAuthorName(),
            $comment->getUserId()
        );

        $allModels = [];
        $allModels[] = $commentViewModel;
        $allModels[] = $errorModel;

        if (isset($_POST['edit-comment'])) {
            if ($_POST['comment']==''){
                $errorModel->error = true;
                return new View($allModels);
            }

            $dateTime = new \DateTime(null, new \DateTimeZone('Europe/Sofia'));
            $stringTime = $dateTime->format('Y-m-d H:i:s');

            $comment->setComment($_POST['comment'])
                ->setDateTime($stringTime);
            $result = CommentsRepository::save();
            if($result){
                $commentViewModel->setComment($_POST['comment']);
                $errorModel->success = true;
                return new View($allModels);
            }

            $errorModel->success=true;
            return new View($errorModel);
        }

        return new View($allModels);
    }
} 