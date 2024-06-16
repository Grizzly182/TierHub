import { SortableContext, rectSortingStrategy, useSortable } from "@dnd-kit/sortable";
import { CSS } from "@dnd-kit/utilities";
import React from "react";
import styled from "styled-components";
import Item from "./item"
import { DndContext, useDroppable } from "@dnd-kit/core";

const containerStyle = {
    display: 'flex',
    flexDirection: 'row',
    alignItems: 'start',
    width: '100%',
    minWidth: '100px',
    marginTop: '2rem'
};

const RowHeader = styled.div`
    display: flex;
    width: 100px;
    height: 100px;
    min-width: 100px;
    align-items: center;
    justify-content: center;
    margin: 1px;
    color: white;
    font-weight: bold;
    font-size: 1.5rem;
    font-family: 'Courier New', Courier, monospace;
`;
const itemsContainerStyles = {
    display: 'flex',
    flexDirection: 'row',
    flexWrap: 'wrap',
    width: '100%',
    minHeight: '100px',
    margin: '1px',
};

const Tray = (props) => {
    const { setNodeRef } = useDroppable({
        id: props.id,
        disabled: props.disabled
    });

    return (
        <div style={containerStyle}>
            <SortableContext items={props.items} strategy={rectSortingStrategy}>
                <div style={itemsContainerStyles} ref={setNodeRef}>
                    {props.items.map((item) => {
                        return <Item key={item.id} id={item.id} path={item.path} disabled={props.disabled}></Item>
                    })}
                </div>
            </SortableContext>
        </div>
    );
};

export default Tray;