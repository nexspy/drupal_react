<?php

namespace Drupal\beautiful_comments\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'field_react' field type.
 *
 * @FieldType(
 *   id = "field_react",
 *   label = @Translation("React Field"),
 *   module = "beautiful_comments",
 *   description = @Translation("Add reaction to any enttiy including comments."),
 *   default_widget = "field_react_widget",
 *   default_formatter = "field_react_formatter"
 * )
 */
class ReactionItem extends FieldItemBase {

  /**
   * Data representation of the field in a database
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * Define data which appears on entity forms where this field type is being used.
   * Similar to a baseFieldDefinition of a content entity
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Reaction'));

    return $properties;
  }

}
