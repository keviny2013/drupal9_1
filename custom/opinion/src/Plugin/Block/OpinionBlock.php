<?php
namespace Drupal\opinion\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "opinion_custom_block",
 *   admin_label = @Translation("Opinion Block"),
 *   category = @Translation("Opinion Block"),
 * )
 */
 class OpinionBlock extends BlockBase {
     /**
      * {@inheritdoc}
      */
      public function build() {

       // $this->getNode();
        
      }

      public function getNode(){
          //echo 'hello';
        $node = \Drupal::routeMatch()->getParameter('node');
        $database = \Drupal::database();
        $nid = $node->id();
        $query = $database->select('node__field_node_reference', 'n');
        $query->condition('n.field_node_reference_target_id', $nid, '=');
        $query->fields('n', ['entity_id']);
        $result = $query->execute()->fetchObject();
        $node = \Drupal\node\Entity\Node::load($result->entity_id);

        
       // echo '<a href="/node/'.$node->id().'">'.$node->getTitle().'</a>';
      }
 }